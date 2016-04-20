
<table class="table table-hover">
    <thead>
        <th>Symbol</th>
        <th>Price</th>
        <th>Number of shares</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        if(isset($info))
        {
            foreach($info as $position)
            {
        ?>
        <tr>
            <td><?=$position["symbol"];?></td>
            <td><?=$position["price"];?></td>
            <td><?=$position["shares"];?></td>
            <td>
                <form method="post" action="sell.php?id=<?=$position["id"]?>">
                    <input class="btn btn-info"type="submit" value="Sell"/>
                </form>
            </td>
        </tr>
        <?php } }?>
    </tbody>
</table>