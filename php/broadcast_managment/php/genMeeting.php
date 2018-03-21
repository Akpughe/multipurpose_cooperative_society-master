<?php 
require '../../actions/conn.php';
session_start();
extract($_SESSION);
$date = date('l/d/m/Y');

if($_SERVER["REQUEST_METHOD"]== "POST"){
    extract($_POST);
    $query="INSERT INTO `meeting`(`info`, `venue`, `branch_id`, `date_time`, `created_date`) VALUES ('$info','$venue','$branch_id','$date_time','$date');";
    $query.="INSERT INTO `broadcast`( `title`, `message`, `status`, `branch_id`, `creation_date`) VALUES ('New Meeting','".$info.$venue."','Branch','$branch_id','$date');";
    if(mysqli_multi_query($link,$query)){
      echo "Meeting Scheduled Successfully";
    }else{
        echo "Error, Something Went Wrong. Try Again";
    }
}
?>