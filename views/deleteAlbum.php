<?php
if(isset($_GET["id"]))
$album->Delete($_GET["id"]);
header('Location: index.php?action=management_album');
?>