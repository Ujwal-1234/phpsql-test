<?php
session_start();
$stname2=$_SESSION['userid'];
require 'dbh.php';
echo 'update file';
if(isset($_POST['update'])){
    echo 'update clicked';
    $streg = 1;
    $stname1 = $_POST['stname'];
    $stdpt1 = $_POST['stdpt'];
    $stbatch1 = $_POST['stbatch'];
    $stsem1 = $_POST['stsem'];
    $stmail1 = $_POST['stmail'];

    $sql = "UPDATE `students`, `users` SET `students`.`st_name`='$stname1',`students`.`st_dept`='$stdpt1',`students`.`st_batch`='$stbatch1',`students`.`st_sem`='$stsem1',`students`.`st_email`='$stmail1',
    `users`.`username`='$stname1' WHERE `students`.`st_name`=`users`.`username` AND `users`.`username`='$stname2'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['userid']=$stname1;
        header("Location: dashboard.php?status=submitted");
      } else {
        header("Location: dashboard.php?error=notsubmitted");
      }
    
}
?>
