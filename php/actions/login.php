<?php
include './php/actions/conn.php';
session_start();

if($_GET["logout"]==1 && isset($_SESSION)){
  session_destroy();
  $message="<div class='alert alert-success'>You have been logged out. Have a nice day</div>";
}
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    extract($_POST);
    if ($email != "" && $pwd != ""){
      if($type== 'user'){
        $email = mysqli_real_escape_string($link,$_POST["email"]);
        $npwd = mysqli_real_escape_string($link,$_POST["pwd"]);
        $query3 = "SELECT * FROM `account_holders` WHERE `email`='$email' AND `password`='$npwd' LIMIT 1";
        $result2 = mysqli_query($link,$query3);
        $row2 = mysqli_fetch_array($result2);
        if($row2){
          $_SESSION['account_holder_id']= $row2['account_holder_id'];
          $_SESSION['branch_id']= $row2['branch_id'];
          if($_SESSION['account_holder_id'])
          header("Location:./php/users_page/index.php");
        }else{
          $result = "<div class='alert alert-danger alert-dismissible'>
          We could not find a user with your input details.
          </div>";
        }
      }
      if($type == 'employee'){
        if ($email == "admin@mcs.com" && $pwd == "excellency"){
          header('Location: ./php/general_management/index.php');
        }else{
        $email = mysqli_real_escape_string($link,$email);
        $npwd = mysqli_real_escape_string($link,$pwd);
        $query2 = "SELECT * FROM `employees` WHERE `email`='$email' AND `password`='$npwd' LIMIT 1";
        $result1 = mysqli_query($link, $query2);
        $row1 = mysqli_fetch_array($result1);
         if ($row1){
           switch ($row1["department"]) {
             case 'Registry':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/file_management/registry/admin.php");
               break;
             case 'Branch':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/branch_management/index.php");
               break;
             case 'Records':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/attendance_management/employee/index.php");
               break; 
             case 'Broadcast':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/broadcast_management/index.php");
               break;
             case 'Loan':
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/loan_management/index.php");
               break;           
             default:
                $_SESSION['id']= $row1['employee_id'];
                $_SESSION['branch_id'] = $row1['branch_id'];
                if($_SESSION['id'] && $_SESSION['branch_id'])
                header("Location:./php/file_management/employees/user.php");
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
mysqli_close($link);
 ?>
