<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];
$token = $_GET['token'];
//deleting the row from table
$result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Cancelled' WHERE `id`=$id and `token` = $token");

//redirecting to the display page (index.php in our case)
header("Location:empleave.php");
?>

<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE `project` SET `status`='Unsubmmited' WHERE `id`=$id");

//redirecting to the display page (index.php in our case)
header("Location:empproject.php");//header("Location:empleave.php"); //header("Location:assignproject.php");
?>