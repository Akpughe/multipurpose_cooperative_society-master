<?php
  include '../actions/conn.php';
  $upUser = $_POST["upUser"];
  $query = "SELECT * FROM users WHERE id=$upUser";
  $result = $link->query($query);
  $askdb= "SELECT * FROM department";
  $ansdb = $link->query($askdb);
  if(mysqli_query($link,$askdb)){
    if(mysqli_num_rows($ansdb)> 0){
      while($option = mysqli_fetch_assoc($ansdb)){
        $dept_list = " <option value='".$option["department_name"]."'>
        ".$option["department_name"]."
        </option>";
      }
    }
  }
 ?>
 <!Doctype html>
 <html lang=en>
  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jQuery.js"></script>
     <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/update.js"></script>
    <script src="../../js/edit.js"></script>
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
          <h1 class="navh1 ">Edit User</h1>
        </div>
      </div>
    </nav>
    <br /><br />
    <div class="container-fluid">
      <div class="row upuser_response">

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
              <tr>
                <th>
                  <h5>UserName</h5>
                </th>
                <th>
                  <h5>Department</h5>
                </th>
                <th>
                  <h5>Email Address</h5>
                </th>
                <th>
                  <h5>Status</h5>
                </th>
                <th>
                  <h5>New Password</h5>
                </th>
              </tr>
              <?php
                if(mysqli_query($link,$query)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<tr><th>".$row["username"]."</th><th>".$row["department"]."</th><th>".$row["email"]."</th><th>".$row["status"]."</th></tr><tr><form action='./updateUser1.php' method='POST' id='nu_form'><td><input placeholder='New UserName' name='nuname' id='nuname' type='text' class='form-control' /></td>
                      <td>
                      <select id='nudept' name='nudept' class='form-control'>
                        ".$dept_list."
                      </select>
                      </td>
                      <td>
                        <input placeholder='New Email Address' name='nuemail' id='nuemail' class='form-control'type='email' />
                      </td>
                      <td>
                        <select id='nustatus' name='nustatus' class='form-control'>
                          <option value='Active'>
                            Active
                          </option>
                          <option value='Inactive'>
                            Inactive
                          </option>
                        </select>
                      </td>
                      <td>
                        <input placeholder='New Password' name='nupass' id='nupass' class='form-control' type='text' />
                      </td>
                      <td>
                        <button type='submit' id='nusubmit' value='".$row["id"]."' name='nusubmit' class='btn btn-success form-control'>Update</button>
                      </td></tr> </form>";
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
