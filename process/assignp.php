<?php

    require_once ('dbh.php');

    $pname = $_POST['pname'];
    $eid = $_POST['eid'];
    $subdate = $_POST['duedate'];
    $remark = $_POST['remark'];
    //$file = $_POST['file'];

    $sql = "INSERT INTO `project`(`eid`, `pname`, `duedate` , `remark`, `status`) VALUES ('$eid' , '$pname' , '$subdate' ,  '$remark', 'Due')";
    $result = mysqli_query($conn, $sql);

    if(($result) == 1){   
        header("Location: ..//assignproject.php");
    }

    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Failed to Assign')
            window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
?>

<!---?php

require_once ('dbh.php');
$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];
//$rmark = $_POST['rmark'];
//$file = $_POST['file'];

$sql = "INSERT INTO `project`(`eid`, `pname`, `duedate` , `status`) VALUES ('$eid' , '$pname' , '$subdate' , 'Due')";
$result = mysqli_query($conn, $sql);


    if (($result) == 2) {
        header("Location: ..//assignproject.php");
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Failed to Assign')
            window.location.href='javascript:history.go(-2)';
            </SCRIPT>");
    }
?--->