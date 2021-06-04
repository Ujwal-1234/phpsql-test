<?php
require 'dbh.php';
if(isset($_POST['clicklog'])){
    if(empty($_POST['logid']) && empty($_POST['logpass'])){
        header("Location: index.php?error=emptyfield");    
    }else{
        $logid = $_POST['logid'];
        $logpass = $_POST['logpass'];
        $sql = "SELECT * FROM `users` WHERE `username` = '$logid'";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows === 1) {
             $sql = "SELECT password FROM `users` WHERE `username`='$logid'";
             $result = $conn->query($sql);
                    if ($result) {
                        if ($result->num_rows === 1) {
                            while ($row=$result->fetch_assoc()) {
                                if ($logpass == $row['password']) {
                                     session_start();
                                     $_SESSION['userid']= $logid;
                                    header("Location: dashboard.php?status=success2");
                                    exit();
                                }else{
                                    header("Location: index.php?error=Invalidpass");
                                    exit();
                                }
                            }
                        }else {
                            header("Location: index.php?error=error1");
                            exit();
                        }
                    }else{
                        header("Location: index.php?error=error2");
                        exit();
                    }
            }else{
                header("Location: index.php?error=usernotavailable1");
                exit();
            }
        }else{
            header("Location: index.php?error=usernotavailable");
            exit();
        }
    }
}
?>