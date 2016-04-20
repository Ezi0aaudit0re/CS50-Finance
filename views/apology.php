<h1>Sorry!</h1>
<p><?= htmlspecialchars($message) ?></p>

<?php 
    unset($_SESSION["message"]);
?>
