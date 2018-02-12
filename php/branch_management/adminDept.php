<?php
include '../actions/conn.php';
$date = date("Y-m-d h:i:s");


$dname = $_POST["dname"];
if($dname==""){
  $issue3="Input a Department Name<br/>";
}
if($issue3){
  $result3="<div class='alert alert-danger'><h5>There were Errors in Your Form:</h5>".$issue3."Try Again!!</div>";
  echo $result3;
}else{
  $query1 = "INSERT INTO `department` (`department_name`,`date_created`)VALUES('$dname','$date')";
  if(mysqli_query($link,$query1)){
    echo  "<div class='alert alert-success text-center'><h5>You Have Successfully Created The Department</h5></div>";
  }else{
    echo  "<div class='alert alert-danger text-center'><h5>Failed. Something Seems to be Wrong. Try Again Later</h5></div>";
  }
  mysqli_close($link);
}
 ?>
