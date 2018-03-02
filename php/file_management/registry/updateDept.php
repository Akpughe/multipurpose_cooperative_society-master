<?php
  include '../../actions/conn.php';
  session_start();
  extract($_POST);
  extract($_SESSION);
  
  $query = "SELECT * FROM `departments` WHERE `dept_id`='$upDept' AND `branch_id`='$branch_id'";
  $result = $link->query($query);
 ?>
 <!Doctype html >
 <html lang="en">
   <head>
       <meta charset=utf-8 />
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Registry Admin</title>
       <link rel="stylesheet" href="../css/bootstrap.min.css">
       <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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
     <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top ">
           <h1 class="navbar-brand ">Edit Department </h1>
     </nav>
     <br /><br /><br/><br/>
     <div class="container-fluid">
      <div class="row upfile_response"></div>
     <div class="row">
      <div class="col-md">
     <div class='table-responsive'>
       <table class='table table-hover table-bordered text-center'>
         <tr>
           <th>
             <h5>Department Name</h5>
           </th>
         </tr>
     <?php
      if(mysqli_query($link,$query)){
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr><th>".$row["dept_name"]."</th><tr>
              <form action='./updateDept1.php' method='POST' id='nd_form'>
                <td>
                  <input placeholder='New Department Name' name='ndname' type='text' id='ndname' class='form-control' />
                </td>
                <td>
                  <button type='submit' id='ndsubmit' value='".$row["dept_name"]."' name='ndsubmit' class='btn btn-success form-control'>Update</button>
                </td>
              </form>
            </tr>";
          }
        }
      }
     ?>

   </table>
 </div>
    </div>
    </div>
     </div>
    </body>
</html>
