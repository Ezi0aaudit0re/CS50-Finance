<?php
    if(isset($message))
    {
        echo "<h1 class='alert alert-success'>{$message}</h1>";
        die();
    }    
?>
<div class="container">
    <div class="col-md-6 pull-left">
        <h2><u>Update Password</u></h2><br>
        <form action="profile.php" method="POST">
            <input type="password" name="password" placeholder="Password"/>
            <input type="password" name="confirmation" placeholder="Confirm Password"/>
            <input type="submit" value="Update Password" class="btn btn-info"/>
            <input type="hidden" name="update" value="password" />
        </form>
    </div>
    <div class="col-md-6 pull-right">
        <h2><u>Add Funds</u></h2>
        <form action="profile.php" method="POST">
            <input type="number" name="money" placeholder="Amount"/>
            <input type="number" name="confirmation" placeholder="Confirm Amount"/>
            <input type="submit" value="Update Funds" class="btn btn-info"/>
            <input type="hidden" name="update" value="amount" />
        </form>
    </div>
</div>