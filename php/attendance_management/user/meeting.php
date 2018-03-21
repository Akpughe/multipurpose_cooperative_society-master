<?php
include './php/actions/conn.php';
session_start();
$date = date('l/d/m/Y');
$time = date('h:i:sa');

//Logout Section
if ($_GET["logout"] == 1 && $_SESSION['id']) {
    $query4 = "UPDATE `attendance` SET `outtime`='$time' WHERE `meeting_id`= AND `account_holder_id`= ";
    if(mysqli_query($link,$query4)){
        $message = "<div class='alert alert-success'>You have been logged out. Have a nice day</div>";
        session_destroy();
    }
    
}

//Login Section
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    if($type == 'user'){
     $q5="SELECT * FROM `account_holders` WHERE `email`='$email' AND `password`='$pwd' LIMIT 1";
     if($r1=mysqli_query($link,$q5)){
         $row1= mysqli_fetch_assoc($r1);
         $q7="INSERT INTO `attendance`(`date`, `intime`, `meeting_id`, `account_holder_id`) VALUES ('$date','$time','$meeting','".$row1["account_holder_id"]."')";
         if(mysqli_query($link,$q7)){
             $_SESSION['id'] = $row1["account_holder_id"];
             $_SESSION['meeting'] = $meeting;
            $message = "<div class='alert alert-success'>You have been logged In. Logout When done from the meeting</div>";
         }else{
             $message = "<div class='alert alert-danger'>Somethings Wrong.</div>";
         }
     }
    }else{
     $q6="SELECT * FROM `employees` WHERE `email`='$email' AND `password`='$pwd' LIMIT 1";
     if($r2=mysqli_query($link,$q6)){
         $row2= mysqli_fetch_assoc($r2);
         $q8="INSERT INTO `attendance`(`date`, `intime`,  `meeting_id`, `employee_id`) VALUES ('$date','$time','$meeting','".$row2["employee_id"]."')";
         if(mysqli_query($link,$q8)){
            $_SESSION['id'] = $row2["employee_id"];
            $_SESSION['meeting'] = $meeting;
            $message = "<div class='alert alert-success'>You have been logged In. Logout When done from the meeting</div>";
         }else{
             $message = "<div class='alert alert-danger'>Somethings Wrong. Try Again</div>";
         }
     }
    }
    
}
mysqli_close($link);
?>