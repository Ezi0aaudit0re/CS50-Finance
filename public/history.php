<?php
    // configuration
    require("../includes/config.php");
    
    // get data from histories table
    $results = CS50::query("SELECT * FROM histories WHERE user_id = ? ", $_SESSION['id']);
    if($results)
    {
        foreach($results as $result)
        {
            $history[] =[
                  "action" => $result["action"],
                  "symbol" => $result["symbol"],
                  "price" => $result["price"],
                  "number" => $result["number"],
                  "time" => $result["updated_at"]
                ];
        }
        
        render("history_form.php", ["title" => "History", "info" => $history]);
    }        

