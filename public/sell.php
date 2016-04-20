<?php
    // configuration
    require("../includes/config.php");
    
    // IF A USER DECIDES TO SELL A SHARE
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $result = CS50::query("SELECT * FROM portfolios WHERE id = ? LIMIT 1", $_GET["id"]);
        if(!$result)
            render("sell_form.php");
        $share_info = lookup($result[0]["symbol"]);
        $amount = number_format(($share_info["price"] * $result[0]["shares"]), 2);
        
        // Update users cash
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $amount, $_SESSION["id"]);
        
        // DELETE THE SHARE
        CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $share_info["symbol"]);
        
        //UPDATE THE HISTORIES TABLE
        CS50::query("INSERT INTO histories (user_id, action, symbol, price, number, updated_at) VALUES (  ?, 'sold', ?, ?, ?, NOW())", $_SESSION["id"], strtoupper($result[0]["symbol"]), number_format($share_info["price"], 2), $result[0]["shares"]);
        
    }
    
    // DISPLAY REMAINING SHARES
    $results = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    if($results)
    {
        foreach($results as $result)
        {
            $share_info = lookup($result["symbol"]);
            $position[]= [
                        "symbol" => $share_info["symbol"],
                        "price" => number_format($share_info["price"], 2),
                        "shares" => $result["shares"],
                        "id" => $result["id"]
                    ];
        }
    }
    
    // render sell_form.php page
    render("sell_form.php", ["info" => $position]);    
        
?>