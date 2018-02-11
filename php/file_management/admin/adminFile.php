<?php
  include '../actions/conn.php';
    $fsp = $_POST["fsp"];
    $fref =  $_POST["fref"];
    $fsub =  $_POST["fsub"];
    $fdept =  $_POST["fdept"];
    $fdept2 = "REGISTRY";
    $frmk =  $_POST["frmk"];
    $fstp = 1;
    $a= "Outgoing/Creation";
    $date = date("Y-m-d h:i:s");
    $stat = "Active";
    $uf = "Registry Personell";

    $query1 = "INSERT INTO `history` (`file_reference`,`file_subject`,`stop_page`,`start_page`,`dept_to`,`dept_from`,`file_remarks`,`date`,`action`,`status`,`user`)VALUES('$fref','$fsub','$fsp','$fstp','$fdept','$fdept2','$frmk','$date','$a','$stat','$uf')";
    $query2 = "INSERT INTO `incoming` (`file_reference`,`file_subject`,`stop_page`,`start_page`,`dept_to`,`dept_from`,`file_remarks`,`date`,`status`,`user_from`) VALUES ('$fref','$fsub','$fsp','$fstp','$fdept','$fdept2','$frmk','$date','$stat','$uf')";

    if($fref==""){
      $issue1.="Please Input File Reference<br />";
    }
    if($fsub==""){
      $issue1.="Please Input File Subject<br />";
    }
    if($fdept==""){
      $issue1.="Please Input Destination Department<br />";
    }
    if($frmk==""){
      $issue1.="Please Input File Remark<br /> ";
    }
    if($issue1){
      $result1="<div class='alert alert-danger text-center'><h5>There were Errors in Your Form:</h5>".$issue1."Try Again!!</div>";
      echo $result1;
    }else{

      if(mysqli_query($link,$query1) && mysqli_query($link, $query2)){
        echo "<div class='alert alert-success text-center'><h5>You Have Successfully Created The File. Your Page will refresh soon</h5></div>";

      }else{
        echo "<div class='alert alert-danger text-center'><h5>Failed. Something Seems to be Wrong. Try Again Later</h5></div>";
      }
      mysqli_close($link);
    }
 ?>
