<?php
include_once("sqlConn.php");
$con -> select_db("my_db");

echo $sql="DELETE FROM persons WHERE personID=".$_GET['id'];
$con->query($sql);
header("Location:index.php");
?>