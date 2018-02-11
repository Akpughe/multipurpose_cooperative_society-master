<?php
  include '../actions/conn.php';
  $arFile=$_POST["arFile"];
  $date = date("Y-m-d h:i:s");

  if($arFile){
    $query1="UPDATE `incoming` SET `status`='Archived',`date`='$date' WHERE id='$arFile' LIMIT 1";
    $query2="SELECT * FROM `incoming` WHERE `id`='$arFile' LIMIT 1";
    $result = $link->query($query2);
    if(mysqli_query($link,$query1) && mysqli_query($link,$query2)){
      $output="<div class='alert alert-success'>
       The File Has been Archived. You would be redirected soon
      </div>";
      header( "refresh:3;url=http://localhost/File Tracker/php/admin/admin.php" );
      if(mysqli_num_rows($result)> 0){
        while($row = mysqli_fetch_assoc($result)){
          $query3="INSERT INTO `history`(`file_reference`,`file_subject`,`stop_page`,`start_page`,`dept_to`,`dept_from`,`file_remarks`,`date`,`action`,`status`,`user`)VALUES('".$row["file_reference"]."','".$row["file_subject"]."','".$row["stop_page"]."','".$row["start_page"]."','".$row["dept_to"]."','".$row["dept_from"]."','".$row["file_remarks"]."','$date','Archived','Archived','".$row["user_from"]."')";
          if(mysqli_query($link,$query3)){
            $output1 = "<div class='alert alert-success'>
            Your Action Has been duely recorded
            </div>";
            header( "refresh:3;url=http://localhost/File Tracker/php/admin/admin.php" );
          }
        }
      }
    }
  }
?>
<!Doctype html >
<html lang="en">
  <head>

  <meta charset=utf-8 />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php echo $output.$output1; ?>
  </body>
</html>
