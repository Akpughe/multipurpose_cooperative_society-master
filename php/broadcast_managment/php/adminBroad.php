<?php
require '../../actions/conn.php';
session_start();
extract($_SESSION);
$date = date("Y-m-d h:i:s");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    extract($_POST);
    $q1 = "INSERT INTO `broadcast`(`title`, `message`, `status`, `branch_id`, `creation_date`) VALUES ('$title','$message','$status','$branch_id','$date')";
    if(mysqli_query($link,$q1)){
        echo "Message Sent";
    }else{
        echo "Message Not Sent, Try Again";
    }
}
?>