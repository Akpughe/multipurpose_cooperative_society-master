<?php
include './php/actions/conn.php';
session_start();

if($_GET["logout"]==1 && $_SESSION['id']){
  session_destroy();
  $message="<div class='alert alert-success'>You have been logged out. Have a nice day</div>";
}
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $type = $_POST["type"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    if ($email != "" && $pwd != ""){
      if($type== 'user'){
        $email = mysqli_real_escape_string($link,$_POST["email"]);
        $npwd = mysqli_real_escape_string($link,$_POST["pwd"]);
        $pwd1 = md5(md5($email.$npwd));
        $query3 = "SELECT * FROM `account_holders` WHERE `email`='$email' AND `password`='$pwd1' LIMIT 1";
        $result2 = mysqli_query($link,$query3);
        $row2 = mysqli_fetch_array($result2);
        if($row2){
          $_SESSION['id']= $row2['account_holder_id'];
          if($_SESSION['id'])
          header("Location:../users_page/index.php");
        }else{
          $result = "<div class='alert alert-danger alert-dismissible'>
          We could not find a user with your input details.
          </div>";
        }
      }else{
        if ($email == "admin@mcs.com" && $pwd == "excellency"){
          header('Location: php/general_management/index.php');
        }else{
        $email = mysqli_real_escape_string($link,$_POST["email"]);
        $npwd = mysqli_real_escape_string($link,$_POST["pwd"]);
        $pwd1 = md5(md5($email.$npwd));
        $query2 = "SELECT * FROM `employees` WHERE `email`='$email' AND `password`='$pwd1' LIMIT 1";
        $result1 = mysqli_query($link, $query2);
        $row1 = mysqli_fetch_array($result1);
         if ($row1){
           switch ($row1["department"]) {
             case 'Registry Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../file_management/registry/admin.php");
               break;
             case 'Branch Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../branch_management/index.php");
               break;
             case 'Sales Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../orders_management/index.php");
               break;
             case 'Records Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../attendance_managment/index.php");
               break; 
             case 'General Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../general_managment/index.php");
               break;
             case 'Broadcast Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../broadcast_management/index.php");
               break;
             case 'Loan Management':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../loan_management/index.php");
               break;           
             default:
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:../file_management/employees/user.php");
               break;
           }  
         }else{
           $result = "<div class='alert alert-danger alert-dismissible'>
           We could not find a user with your input details.
           </div>";
         }
        }
      } 
    }else{
      $result = "<div class='alert alert-info alert-dismissible'>
      Empty Details
      </div>";
    }
}
 ?>
