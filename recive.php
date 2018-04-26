<?php


$connect = mysqli_connect("localhost", "root", "", "review") or die ("Please, check the server connection.");

$name = $_POST['name'];
$birth = $_POST['birth'];

$sql = "INSERT INTO pet (name,birth) VALUES ('$name','$birth')";

$result = mysqli_query($connect, $sql) or die(mysql_error());

?>