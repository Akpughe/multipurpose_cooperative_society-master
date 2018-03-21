<?php
  include '../../actions/conn.php';
    session_start();
    extract($_POST);
    extract($_SESSION);
    $fdept2 = "REGISTRY";
    $fstp = 1;
    $a= "Creation";
    $date = date("Y-m-d h:i:s");
    $stat = "Active";
    $uf = "Registry Personell";

    $query1 = "INSERT INTO `history` (`file_reference`,`file_subject`,`stop_page`,`start_page`,`dept_to`,`dept_from`,`file_remarks`,`date`,`action`,`status`,`employee`)VALUES('$fref','$fsub','$fsp','$fstp','$fdept','$fdept2','$frmk','$date','$a','$stat','$uf')";
    $query2 = "INSERT INTO `incoming_file` (`file_reference`,`file_subject`,`stop_page`,`start_page`,`dept_to`,`dept_from`,`file_remarks`,`date`,`status`,`employee`,`branch_id`,) VALUES ('$fref','$fsub','$fsp','$fstp','$fdept','$fdept2','$frmk','$date','$stat','$uf','$branch_id')";

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
      
    }
    mysqli_close($link);
 ?>
