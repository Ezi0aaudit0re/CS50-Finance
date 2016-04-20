<?php
    if(isset($message))
        die("<h1 class='alert alert-success'>{$message}</h1>");
    
?>

<h1>Please enter the share you want to buy</h1>
<?php

if(!isset($info))
{

?>
<form action="buy.php" method="Post">
        <input type="text" name="symbol" placeholder="Symbol"/><br>
        <input type="submit" value="Submit" class="btn btn-info"/>
</form> 
<?php
} 
else
{
?>    
<table class="table table-hover">
    <thead>
        <tr>        
            <th>Name</th>
            <th>Symbol</th>
            <th>Price</th>
            <th>Number</th>
            <th>Action</th>
        </tr>    
    </thead>
    <tbody>
        <tr>
            <td><?=$info["name"]?></td>
            <td><?=$info["symbol"]?></td>
            <td><?=$info["price"]?></td>
            <form method="Post" action="buy.php">
                    <input type="hidden" name="buy" value="true"/>
                    <input type="hidden" name="symbol" value=<?=$info["symbol"]?>>
                    <td><input type="number" name="number" style="width: 100px"/></td>                
                    <td><input type="submit" value="Buy" class="btn btn-info"/></td>
            </form>
        </tr>
    </tbody>
</table>
<?php } ?>


