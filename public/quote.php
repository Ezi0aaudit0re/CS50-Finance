
<?php

     // configuration
    require("../includes/config.php"); 
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("quote_form.php", ["title" => "Quote"]);
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $result = lookup($_POST["symbol"]);
        if($result)
        {
            render("price.php", ["title" => "price", "result" => $result]);
        }
        else
        {
            $_SESSION["message"] = "The symbol doesnot exist";
            render("apology.php", ["title" => "apology"]);
        }
            
    }
    else
        render("apology.php", ["title" => "apology"]);
?>