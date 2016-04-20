<?php
    // configuration
    require("../includes/config.php"); 
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("buy_form.php", ["title" => "buy"]);
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // get the share name searched for
        $share_info = lookup($_POST["symbol"]);
        if(isset($_POST["buy"]) && preg_match("/^\d+$/", $_POST["number"]))
        {
            $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
            if($cash)
            {
                if($cash[0]["cash"] > ($_POST["number"] * $share_info["price"]) )
                {
                    CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["number"]);
                    // update the histories table
                    CS50::query("INSERT INTO histories (user_id, action, symbol, price, number, updated_at) VALUES (  ?, 'bought', ?, ?, ?, NOW())", $_SESSION["id"], strtoupper($_POST["symbol"]), number_format($share_info["price"], 2), $_POST["number"]);
                }    
                else
                    apologize("You dont have enough money to buy the shares");
            }
        }
        else
        {
            if(!$share_info)
                apologize("The symbol doesnot exist");
            else
                render("buy_form.php", ["title" => "buy", "info" => $share_info]);
        }
        
    }
    
    render("buy_form.php", ["title" => "buy", "message" => "You have sucessfully bought the shares"]);

?>