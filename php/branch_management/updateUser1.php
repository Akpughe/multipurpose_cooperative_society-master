<?php

    include '../actions/conn.php';
    $nuname= $_POST["nuname"];
    $nudept= $_POST["nudept"];
    $nustatus= $_POST["nustatus"];
    $nuemail= $_POST["nuemail"];
    $nupass= $_POST["nupass"];
    $nusubmit= $_POST["nusubmit"];

    $sql = "UPDATE `users` SET `username`= '".$nuname."' ,`department`='".$nudept."',`status`='".$nustatus."'
    ,`email`='".$nuemail."',`password`='".md5(md5($nuemail.$nupass))."' WHERE `id` = '".$nusubmit."'";
    if (mysqli_query($link,$sql)){
      $output = "<div class='alert alert-success'>Updated Successfully. You would be redirected soon</div>";
      header( "refresh:3;url=http://localhost/File Tracker/php/admin/admin.php" );
    }else{
      $output = "<div class='alert alert-danger'>Error Updating Record:".mysqli_error($link)."</div>";
      header( "refresh:3;url=http://localhost/File Tracker/php/admin/admin.php" );
    }
    mysqli_close($link);
?>
<!Doctype html >
<html lang="en">
  <head>

  <meta charset=utf-8 />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
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
    <?php echo $output; ?>
  </body>
</html>
