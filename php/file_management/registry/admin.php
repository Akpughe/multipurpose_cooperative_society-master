<?php
  include '../actions/conn.php';
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <script src="../../js/jQuery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/admin.js"></script>
    <script src="../../js/update.js"> </script>
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

      .container {
        width:auto;
        height:auto;
        margin:0 auto;
      }
      body {
        background-color: #102334;
        height:100%;
        width:100%;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse ">
      <div class="container-fluid text-center">
        <div class="navbar-header">
          <h1 class="navh1 ">Welcome Admin</h1>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../../index.php?logout=1">Logout</a></li>
        </ul>

      </div>
    </nav>
    <div class="container-fluid">
      <div class="row text-center">
        <h1>Creation</h1>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#genFile"><span class="glyphicon glyphicon-folder-open icon"></span><h2>File</h2></button>
        </div>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#genUser"><span class="glyphicon glyphicon-user icon"></span><h2>User</h2></button>
        </div>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#genDept"><span class="glyphicon glyphicon-home icon"></span><h2>Dept.</h2></button>
        </div>
      </div>
      <div class="row text-center">
        <h1>Management</h1>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#manFile"><span class="glyphicon glyphicon-folder-open icon"></span><h2>File</h2></button>
        </div>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#manUser"><span class="glyphicon glyphicon-user icon"></span><h2>User</h2></button>
        </div>
        <div class="col-md-4 text-center">
          <button type="button" class="btn btn-default btn-md text-center" data-toggle="modal" data-target="#manDept"><span class="glyphicon glyphicon-home icon"></span><h2>Dept.</h2></button>
        </div>
      </div>
    </div>
  </body>
  <div class="modal fade" id="genFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" >Create New File</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          .<div class="container-fluid text-center">
              <div class="row response">

              </div>
              <div class="row">
                <form id="genFile_form" method="POST" role="form" action="./adminFile.php">
                  <div class="form-group">
                    <label for="fref">File Reference:</label>
                    <input class="form-control" name="fref" placeholder="Input the File Reference" id="fref" type="text" />
                  </div>
                  <div class="form-group">
                    <label for="fsub">File Subject:</label>
                    <input class="form-control" name="fsub" placeholder="Input File Subject" id="fsub" type="text" />
                  </div>
                  <div class="form-group">
                    <label for="fsp">Starting Pages Added:</label>
                    <input class="form-control" name="fsp" placeholder="Input Pages Added" id="fsp" type="text" />
                  </div>
                  <div class="form-group">
                    <label for="fdept">Destination Department:</label>
                    <select name="fdept" class="form-control">
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
                    <label for="frmk">Remarks:</label>
                    <input class="form-control" name="frmk" placeholder="Input Remark" id="frmk"  type="text"/>
                  </div>
                  <button type="button" id="genFile_submit" class="btn btn-lg btn-danger">Create File</button>
                </form>
              </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="genUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Register New User</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          .<div class="container-fluid text-center">
            <div class="row response2">

            </div>
            <div class="row">
              <form id="genUser_form" method="POST" role="form" action="./adminUser.php">
                <div class="form-group">
                  <label for="uname">Full Name:</label>
                  <input class="form-control" name="uname" id="uname" placeholder="Enter Your Full Name (Surname First)" type="text" />
                </div>
                <div class="form-group">
                  <label for="udept">Department:</label>
                  <select name="udept" class="form-control">
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
                  <label for="uemail">Email Address:</label>
                  <input class="form-control" name="uemail" id="uemail" placeholder="Enter Your Email Address"  type="email"/>
                </div>
                <div class="form-group">
                  <label for="upwd1">Password:</label>
                  <input class="form-control" name="upwd1" id="upwd1" placeholder="Password" type="password" />
                </div>
                <div class="form-group">
                  <label for="upwd2">Confirm Password:</label>
                  <input class="form-control" name="upwd2" id="upwd2" placeholder="Confirm Password" type="password" />
                </div>
                <button type="button" id="genUser_submit" class="btn btn-lg btn-danger">Create Account</button>
              </form>
            </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="genDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Register New Department</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response3">

            </div>
            <div class="row">
              <form id="genDept_form" method="POST" role="form" action="./adminDept.php">
                <div class="form-group">
                  <label for="dname">Department Name:</label>
                  <input type="text" class="form-control" placeholder="Input Department Name" name="dname" id="dname"/>
                </div>
                <button type="button" id="genDept_submit" class="btn btn-lg btn-danger">Register</button>
              </form>
            </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="manFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Manage Files</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response4">

            </div>
          </div>

          ..<div class="container-fluid">
              <div class="row">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <tr>
                      <th>
                        <h4>File Subject</h4>
                      </th>
                      <th>
                        <h4>File Reference</h4>
                      </th>
                      <th>
                        <h4>File Remark</h4>
                      </th>
                      <th>
                        <h4>Date Created</h4>
                      </th>
                      <th>
                        <h4>Department</h4>
                      </th>
                      <th>
                        <h4>Status</h4>
                      </th>
                      <th>
                        <h4>Start Page</h4>
                      </th>
                      <th>
                        <h4>Stop Page</h4>
                      </th>
                    </tr>
                      <?php
                        $query1 = "SELECT * FROM incoming";
                        $result1 = $link->query($query1);
                        if(mysqli_query($link,$query1)){
                          if(mysqli_num_rows($result1) > 0){
                            while($row = mysqli_fetch_assoc($result1)){
                              echo "<tr><td>".$row["file_subject"]."</td><td>".$row["file_reference"]."</td><td>".$row["file_remarks"]."</td><td>".$row["date"]."
                              </td>
                              <td>
                                ".$row["dept_to"]."
                              </td>
                              <td>
                                ".$row["status"]."
                              </td>
                              <td>".$row["start_page"]."</td><td>".$row["stop_page"]."</td><td><form action='./archiveFile.php' method='POST'><button type='submit' id='arFile' name='arFile'  value='".$row["id"]."' class='btn btn-warning'>Archive File</button></form></td>
                                <td>
                                  <form action='./historyFile.php' method='POST'>
                                  <button type='submit' class='btn btn-info' id='hFile' name='hFile' value = '".$row["file_reference"]."'>View History</button>
                                  </form>
                                </td>
                              </tr>";
                            }
                          }
                        }
                      ?>
                  </table>
                </div>
              </div>
          </div>.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="manUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">User Management</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response5">

            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <tr>
                    <th>
                      <h4>Username</h4>
                    </th>
                    <th>
                      <h4>Email</h4>
                    </th>
                    <th>
                      <h4>Dept.</h4>
                    </th>
                    <th>
                      <h4>Date Registered</h4>
                    </th>
                    <th>
                      <h4>Status</h4>
                    </th>
                  </tr>
                  <?php
                    $queryi = "SELECT * FROM users";
                    $resulti = $link->query($queryi);
                    if(mysqli_query($link,$queryi)){
                      if(mysqli_num_rows($resulti) > 0){
                        while($rowi = mysqli_fetch_assoc($resulti)){
                          echo "<tr>
                          <td>
                          ".$rowi["username"]."
                          </td>
                          <td>
                          ".$rowi["email"]."
                          </td>
                          <td>
                          ".$rowi["department"]."
                          </td>
                          <td>
                          ".$rowi["date_registered"]."
                          </td>
                          <td>
                          ".$rowi["status"]."
                          </td>
                          <td>
                          <form action='./updateUser.php' method='POST'>
                          <button type='submit' id='upUser' name='upUser' value='".$rowi["id"]."' class='btn btn-warning'>Edit</button>
                          </form>
                          </td>
                          </tr>";
                        }
                      }
                    }
                   ?>
                </table>
              </div>
            </div>
          </div>...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="manDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Manage Departments</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response5">

            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <tr>
                    <th>
                      <h4>Department Name</h4>
                    </th>
                  </tr>
                  <?php
                    $query3 ="SELECT * FROM department";
                    $result3 = $link->query($query3);
                    if(mysqli_query($link,$query3)){
                     if(mysqli_num_rows($result3)){
                      while($row2 = mysqli_fetch_assoc($result3)){
                        echo "<tr><td>".$row2["department_name"]."</td><td class='text-center'><form action='./updateDept.php' method='POST'><button type='submit' id='upDept' name='upDept' value='".$row2["id"]."' class='btn btn-warning'>Edit</button></td></tr>";
                      }
                    }
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</html>
