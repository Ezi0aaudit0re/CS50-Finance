

<table class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Symbol</th>
        <th>Price</th>
        <th>Number of shares</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($share_info as $position)
        {
    ?>
    <tr>
        <td><?=$position["name"];?></td>
        <td><?=$position["symbol"];?></td>
        <td><?=$position["price"];?></td>
        <td><?=$position["shares"];?></td>
    </tr>
    <?php }?>
    </tbody>
</table>