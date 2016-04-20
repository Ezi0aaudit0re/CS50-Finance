<?php
    
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if the user has entered valid details 
        if(isset($_POST["username"]) && isset($_POST['password']) && isset($_POST["confirmation"]) && ($_POST["password"] == $_POST["confirmation"]))
        {
           $result = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
           if(!$result)
                $_SESSION["message"] = "User already exists";
            else
            {
                $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
                $_SESSION["id"] = $rows[0]["id"];
                header("Location: ./index.php");
            }
                
        }
        else
            $_SESSION["message"] = "There was something wromg with the entered information";
    }
    
    render("apology.php", ["title" => "apology"]);
?>