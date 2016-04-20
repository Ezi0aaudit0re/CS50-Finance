<table class="table table-hover">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Action</th>
            <th>Number</th>
            <th>Price</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($info as $data) {
        ?>
        <tr>
            <td><?=$data["symbol"]?></td>
            <td><?=$data["action"]?></td>
            <td><?=$data["number"]?></td>
            <td><?=$data["price"]?></td>
            <td><?=$data["time"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>