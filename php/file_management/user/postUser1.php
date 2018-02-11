<?php
include '../actions/conn.php';
session_start();
$userId=$_SESSION['id'];
$query = "SELECT * FROM `users` WHERE `id` ='$userId' LIMIT 1 ";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
$nameDisplay = $row['username'];
$deptDisplay = $row['department'];


if($_POST["nfileId"]){
  $fileId = $_POST['nfileId'];
  $query4 = "SELECT * FROM `incoming` WHERE `id` = '$fileId' LIMIT 1";
  $result4 = mysqli_query($link,$query4);
  $row4 = mysqli_fetch_array($result4);
  $file_reference = $row4["file_reference"];
  $file_subject = $row4["file_subject"];
  $stop_page = $row4["stop_page"];
  $deptTo = mysqli_real_escape_string($link,$_POST["deptTo"]);
  $pagesAdd = mysqli_real_escape_string($link,$_POST["pagesAdd"]);
  $newAdd= $stop_page + $pagesAdd;
  $folioOut = mysqli_real_escape_string($link,$_POST["folioOut"]);
  $remarks = mysqli_real_escape_string($link,$_POST["remarks"]);
  $date = date("Y-m-d h:i:s");

  $query1 = "INSERT INTO `outgoing` (`file_reference`,`file_subject`,`start_page`,`stop_page`,`file_remarks`,`dept_from`,`dept_to`,`status`,`folioout`,`date`) VALUES ('$file_reference','$file_subject','$stop_page','$newAdd','$remarks','$deptDisplay','$deptTo','Active','$folioOut','$date')";

  $query2 = "INSERT INTO `history` (`file_reference`,`file_subject`,`date`,`action`,`dept_from`,`dept_to`,`user`,`start_page`,`stop_page`,`file_remarks`,`status`,`folioout`) VALUES ('$file_reference','$file_subject','$date','Outgoing','$deptDisplay','$deptTo','$nameDisplay','$stop_page','$newAdd','$remarks','Active','$folioOut')";



  if(mysqli_query($link,$query1)  &&  mysqli_query($link,$query2))
  {
    $query3 = "UPDATE `incoming` SET `file_reference`='$file_reference',`file_subject`='$file_subject',`dept_from`='$deptDisplay',`dept_to`='$deptTo',`user_from`='$nameDisplay',`date`='$date',`start_page`='$stop_page',`stop_page`='$newAdd',`file_remarks`='$remarks',`status`='Active'";
    if(mysqli_query($link,$query3)){
      $output = "<div class='alert alert-success'><strong><h5>You Have Successfully Posted this File. You will be redirected to your main page</h5></strong></div>";
      header("refresh:2;url=http://localhost/File Tracker/php/user/user.php");
    }else{
      $output = "<div class='alert alert-danger'><strong><h5>Error Please Try again Later.</h5></strong></div>";
      header("refresh:1;url=http://localhost/File Tracker/php/user/user.php");
    }
  }else{
    $output = "<div class='alert alert-success'><strong><h5>Error Please Try again later.</h5></strong></div>";
    header("refresh:1;url=http://localhost/File Tracker/php/user/user.php");
  }
}else{
  $output = "NO Session Variable Detected";
}

?>

<!Doctype html>
<html lang="en">
<head>
<meta charset=utf-8 />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
  <?php echo $output;  ?>

</body>
</html>
