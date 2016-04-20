<?php

     // configuration
    require("../includes/config.php"); 
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // update user password
        if($_POST["update"] == "password" && $_POST["password"] == $_POST["confirmation"])
        {
            CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["password"], PASSWORD_DEFAULT), $_SESSION["id"]);
            $message = "The password has been sucessfully updated";
        }    
        // update user cash    
        else if($_POST["update"] == "amount" && $_POST["money"] == $_POST["confirmation"])
        {
            CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["money"], $_SESSION["id"]);
            $message = "The amount has been sucessfully updated";
        }
        else
            $message = "Something seems to be wrong with the entered information";
        
        // render the views page    
        render("profile_form.php", ["title" => "profile", "message" => $message]);    
    }
    else
        render("profile_form.php", ["title" => "profile"]);
    