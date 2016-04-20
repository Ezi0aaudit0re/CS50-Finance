<?php
    
    // configuration
    require("../includes/config.php"); 
    
    $results = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    if($results)
    {  
        foreach($results as $result)
        {
            $share_info = lookup(strtoupper($result["symbol"]));
            $position[] = [
                "symbol" => $share_info["symbol"],
                "name" => $share_info["name"],
                "price" => number_format($share_info["price"], 2),
                "shares" => $result["shares"]
            ];
        }
         // render portfolio
        render("portfolio.php", ["title" => "Portfolio", "share_info" => $position]);
    }
       
    else
        header("Location: ./");
    
    

?>
