<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
//$result = mysqli_query($conn, "UPDATE `project` SET `status`='Unsubmmited' WHERE `id`=$id AND `pid`=$pid");
//$result = mysqli_query($conn, "UPDATE `project` SET `status`='Unsubmmited' WHERE `id`=$id , `pid`=$pid");
$result = mysqli_query($conn, "UPDATE `project` SET `status`='Unsubmmited' WHERE `id`=$id");
//$result = mysqli_query($conn, "UPDATE `project` SET `status`='Unsubmmited' WHERE `pid`=$pid");

//redirecting to the display page (index.php in our case)
header("Location:empproject.php"); //header("Location:assignproject.php");
?>

