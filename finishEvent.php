<?php
    require_once("connectDb.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    mysql_query("UPDATE events SET completedby = '".$name."' WHERE id = ".$id);
?>