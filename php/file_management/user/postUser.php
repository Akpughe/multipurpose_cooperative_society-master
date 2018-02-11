<?php
include '../actions/conn.php';
?>
<!Doctype html>
<html lang=en>
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
   <nav class="navbar navbar-inverse ">
     <div class="container-fluid text-center">
       <div class="navbar-header">
         <h1 class="navh1 ">Transfer File</h1>
       </div>
     </div>
   </nav>
   <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <form action="./postUser1.php" method="POST" >
           <div class="form-group">
             <label for="deptTo">Destination Department:</label>
             <select name="deptTo" class="form-control">
               <?php
                 $askdb= "SELECT * FROM department";
                 $ansdb = $link->query($askdb);
                 if(mysqli_query($link,$askdb)){
                   if(mysqli_num_rows($ansdb)> 0){
                     while($option=mysqli_fetch_assoc($ansdb)){
                       echo " <option value='".$option["department_name"]."'>
                       ".$option["department_name"]."
                       </option>";
                     }
                   }
                 }
                ?>
             </select>
           </div>
           <div class="form-group">
            <label for="pagesAdd">No of Pages Added</label>
            <input class="form-control" placeholder="Input the No of Pages You have Added" name="pagesAdd" />
           </div>
           <div class="form-group">
             <label for="folioOut">Folio Out</label>
             <textarea name="folioOut" class="form-control" rows="5"></textarea>
           </div>
           <div class="form-group">
             <label for="remarks">Remarks</label>
             <textarea name="remarks" class="form-control" rows="5"></textarea>
           </div>
           <?php
             if($_POST["psubmit"]){
              $fileId = $_POST["psubmit"];
              echo "<div class='form-group'>
                <button type='submit' class='btn btn-success' name='nfileId' value='".$fileId."'>Forward File</button>
              </div>";
            }
            ?>
         </form>
         </div>
       </div>
     </div>
 </body>
</html>
