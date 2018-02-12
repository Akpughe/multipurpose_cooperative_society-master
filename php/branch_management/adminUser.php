<?php
include '../actions/conn.php';
$uname = mysqli_real_escape_string($link,$_POST["uname"]);
$udept = $_POST["udept"];
$uemail = mysqli_real_escape_string($link,$_POST["uemail"]);
$upwd1 = mysqli_real_escape_string($link,$_POST["upwd1"]);
$upwd2 = mysqli_real_escape_string($link,$_POST["upwd2"]);
$date = date("Y-m-d h:i:s");
$status = "Active";
if($uname==""){
  $issue2="Please Input Your User Name<br />";
}
if($udept==""){
  $issue2.="Please Input Your Department<br />";
}
if($uemail==""){
  $issue2.="Please Input An Email Address<br />";
}
if($uemail!="" AND !filter_var($uemail,FILTER_VALIDATE_EMAIL)){
  $issue2.="Please Input a Valid Email Address<br />";
}
if($upwd1=="" AND $upwd2==""){
  $issue2.="Please Input a Password<br />";
}
if($upwd1!=$upwd2){
  $issue2.="Please Input matching entries in the Password fields<br />";
}
if($issue2){
  $result2="<div class='alert alert-danger'><h5>There were Errors in Your Form:</h5>".$issue2."Try Again!!</div>";
  echo $result2;
}else{
  $query1="INSERT INTO `users` (`username`,`email`,`department`,`password`,`date_registered`,`status`)VALUES('$uname','$uemail','$udept','".md5(md5($uemail.$upwd1))."','$date','$status')";
  if(mysqli_query($link,$query1)){
    echo "<div class='alert alert-success text-center'><strong><h5>You Have Successfully Registered the User</h5></strong></div>";
  }else{
    echo "<div class='alert alert-danger text-center'><h5>Failed. Something Seems to be Wrong. Try Again Later</h5></div>";
  }

  mysqli_close($link);
}
 ?>
