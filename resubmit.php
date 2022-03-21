<?php

require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = $_GET['pid'];
$id = $_GET['id'];
$date = date('d-m-Y');
//echo "$date";
$sql = "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE pid = '$pid';";

$result = mysqli_query($conn , $sql);
header("Location: empproject.php?id=$id");
?>