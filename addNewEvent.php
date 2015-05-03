<?php
    require_once('connectDb.php');
    $name = $_POST['name'];
    $loc = $_POST['loc'];
    $yname = $_POST['yname'];
    $date = $_POST['date'];
    mysql_query("INSERT INTO events (name, location, addedby, completedby, date) VALUES ('".$name."', '".$loc."', '".$yname."', 'Not yet completed', ".$date.")");
    echo("OK");
?>