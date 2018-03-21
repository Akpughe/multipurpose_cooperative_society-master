<?php
include '../../actions/conn.php';
session_start();
extract($_POST);
extract($_SESSION);
$uname = mysqli_real_escape_string($link,$uname);
$uemail = mysqli_real_escape_string($link,$uemail);
$upwd1 = mysqli_real_escape_string($link,$upwd1);
$upwd2 = mysqli_real_escape_string($link,$upwd2);
$rFileID = 'Reg-E/'.(date('d:M:Y')).'/'.$branch_id.'/'.$uname;
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

  $query1="INSERT INTO `employees`(`full_name`, `fathers_name`, `mothers_name`, `department`, `birth_date`, `gender_type`, `mobile`, `email`, `password`, `file_reference`, `present_address`, `permanent_address`, `joining_date`, `status`, `branch_id`) VALUES ('$uname','$fathers_name','$mothers_name','$udept','$birth_date','$gender_type','$mobile','$uemail','$upwd1','$rFileID','$present_address','$permanent_address','$date','$status','$branch_id')";

  $query2="INSERT INTO `incoming_file`( `file_reference`, `file_subject`, `dept_from`, `dept_to`, `employee`, `date`, `start_page`, `stop_page`, `file_remarks`, `status`, `branch_id`) VALUES ('$rFileID','Employee Registration','','Registration','','$date','0','1','Newly Registered User','$status','$branch_id')";

  $query3="INSERT INTO `history`( `file_reference`, `file_subject`, `date`, `action`, `dept_from`, `dept_to`, `employee`, `start_page`, `stop_page`, `file_remarks`, `status`, `folio_out`, `branch_id`) VALUES ('$rFileID','Employee Registration','$date','Creation','','Registration','','0','1','Newly Registered User','$status','','$branch_id')";

  if(mysqli_query($link,$query2) && mysqli_query($link,$query3)){

    if(mysqli_query($link,$query1)){

      echo "<div class='alert alert-success text-center'><strong><h5>You Have Successfully Registered the User</h5></strong></div>";

    }else{

      echo "<div class='alert alert-danger text-center'><h5>Failed. Something Seems to be Wrong. Try Again Later</h5></div>";

    }
  }else{
    echo "<div class='alert alert-danger text-center'><h5>Error. Try Again</h5></div>";
  }
  
}
mysqli_close($link);
 ?>
