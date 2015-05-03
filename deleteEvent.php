<?php
    require_once("connectDb.php");
    mysql_query("DELETE FROM events WHERE id = ".$_POST['id']);
?>