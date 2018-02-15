<?php
  include '../../actions/db_config.php';
  session_start();
  $userId = $_SESSION['id'];
  $branchId = $_SESSION['branch_id'];
  $query = "SELECT * FROM `employees` WHERE `employee_id` ='$userId' LIMIT 1 ";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  $nameDisplay = $row['full_name'];
  $date = date("Y-m-d h:i:s");
  $accsubmit = mysqli_real_escape_string($link,$_POST["accsubmit"]);

  if($accsubmit){
    $query1 = "UPDATE `incoming_file` SET `status` = 'Approved' WHERE `file_reference` = '$accsubmit' AND `branch_id` = '$branchId'";
    if(mysqli_query($link,$query1)){
      $query0 = "SELECT * FROM `history` WHERE `file_reference`='$accsubmit' AND `date` = (SELECT max(`date`) FROM `history` WHERE `file_reference`='$accsubmit' LIMIT 1)AND `branch_id`= '$branchId' LIMIT 1";
      $result0= mysqli_query($link,$query0);
      $row0 = mysqli_fetch_array($result0);
      $file_ref= $row0["file_reference"];
      $file_sub= $row0["file_subject"];
      $dep_fro= $row0["dept_from"];
      $dep_to= $row0["dept_to"];
      $sttp= $row0["start_page"];
      $stpp= $row0["stop_page"];
      $file_rmk = $row0["file_remarks"];
      $query2 = "INSERT INTO `history` (`file_reference`,`file_subject`,`date`,`action`,`dept_from`,`dept_to`,`employee`,`start_page`,`stop_page`,`file_remarks`,`status`) VALUES ('$file_ref','$file_sub','$date','Accepted','$dep_fro','$dep_to','$nameDisplay','$sttp','$stpp','$file_rmk','Active')";
      if(mysqli_query($link,$query2)){
        $resultT = "<div class='alert alert-success text-center'><strong><h5>You have approved of this file.</h5></strong></div>";
        header( "refresh:2;url=http://localhost/mulitpurpose_cooperative_society-master/php/file_management/employees/user.php" );
      }else{
        $resultT = "<div class='alert alert-danger text-center'><strong><h5>Something Went Wrong. Try Again</h5></strong></div>";
      }
    }
  }


?>
<!Doctype html>
<html lang="en">
  <head>

  <meta charset=utf-8 />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Employee Dashboard</title>
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <script src="../../js/jQuery.js"></script>
       <script src="../../js/bootstrap.min.js"></script>
       <style>

       h1,h2,h3 {
         color:#CCA567 ;
         font-weight: bold;
       }
       .navh1 {
         color: #CCA567 !important;
         font-weight: bold !important;
       }
       p {
         padding-top:15px;
         padding-button:15px;
       }
       .btn-md{
         border:none !important;
         height:160px;
         width:160px;
         opacity: 0.7;
       }
       .btn-mda{
         border:none !important;
         height:220px;
         width:220px;
         opacity:0.7;
       }
       .icon{
         font-size: 60px;
         font-size-adjust: auto;
       }
       .icona {
         font-size: 90px;
         font-size-adjust: auto;
       }
       h4 {
         font-size: 20px;
         line-height: 1.375em;
         font-weight: 400;
         margin-bottom: 30px;
         font-size-adjust: auto;
       }
       </style>

  </head>
  <body>
    <?php echo $resultT; ?>
  </body>
</html>
