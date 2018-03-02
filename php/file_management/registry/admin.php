<?php
include '../../actions/conn.php';
session_start();
print_r($_SESSION);
extract($_SESSION);


?>
  <!Doctype html>
  <html lang="en">

  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js">
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ajaxhelper.js"></script>
    <script>
      alert('Refresh after actions to view changes');

      function submitCall(div_id) {
        console.log(div_id);
        event.preventDefault();
        let x = div_id;
        console.log(x)
        if (confirm("Click Cancel to Confirm Values Before Submitting and Click Ok to Submit !!") == true) {
          console.log(x);
          let form_id = "#" + x + "_form";
          console.log(form_id)
          genericAjax(form_id);
        }
      };

      function genericAjax(x) {
        var postData = $(x).serializeArray();
        var formURL = $(x).attr("action");
        $.ajax({
          url: formURL,
          type: "POST",
          data: postData,
          success: function (data, textStatus, jqXHR) {
            $(x + '_button').hide();
            $(x + '_response').html(data);
            $(x + '_response').focus();
            console.log(data);
          },
          error: function (jqXHR, status, error) {
            alert('Error please try again');
            console.log(status + ": " + error);
          }
        });
      }
    </script>
    <style>
      h1,
      h2,
      h3 {
        color: #CCA567;
        font-weight: bold;
      }

      .navh1 {
        color: #CCA567 !important;
        font-weight: bold !important;
      }

      p {
        padding-top: 15px;
        padding-button: 15px;
      }

      .btn-md {
        border: none !important;
        height: 160px;
        width: 160px;
        opacity: 0.7;
      }

      .btn-mda {
        border: none !important;
        height: 220px;
        width: 220px;
        opacity: 0.7;
      }

      .icon {
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

      body {
        background-color: whitesmoke;
        height: 100%;
        width: 100%;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <h1 class="navbar-brand">Welcome Registry Admin</h1>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../../login_page.php?logout=1">Logout</a>
        </li>
      </ul>
      </div>
    </nav>
    <br/>
    <br/>
    <div class="container text-center">
      <br/>
      <h1>Creation</h1>
      <br/>
      <div class="row">
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#genFile">
            <span class="glyphicon glyphicon-folder-open icon"></span>
            <h2>File</h2>
          </button>
        </div>
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#genUser">
            <span class="glyphicon glyphicon-user icon"></span>
            <h2>User</h2>
          </button>
        </div>
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#genDept">
            <span class="glyphicon glyphicon-home icon"></span>
            <h2>Dept.</h2>
          </button>
        </div>
      </div>
      <br/>
      <h1>Management</h1>
      <br/>
      <div class="row">
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#manFile">
            <span class="glyphicon glyphicon-folder-open icon"></span>
            <h2>File</h2>
          </button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#manUser">
            <span class="glyphicon glyphicon-user icon"></span>
            <h2>User</h2>
          </button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#manDept">
            <span class="glyphicon glyphicon-home icon"></span>
            <h2>Dept.</h2>
          </button>
        </div>
      </div>
    </div>
  </body>
  <div class="modal fade" id="genFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Create New File</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          .
          <div class="container-fluid text-center">
            <div class="row response">

            </div>
            <div class="row">
              <div class="col-md">
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
                      $askdb = "SELECT * FROM departments WHERE `branch_id` = '$branch_id' ";
                      $ansdb = $link->query($askdb);
                      if (mysqli_query($link, $askdb)) {
                        if (mysqli_num_rows($ansdb) > 0) {
                          while ($option = mysqli_fetch_assoc($ansdb)) {
                            echo " <option value='" . $option["dept_name"] . "'>
                              " . $option["dept_name"] . "
                              </option>";
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="frmk">Remarks:</label>
                    <input class="form-control" name="frmk" placeholder="Input Remark" id="frmk" type="text" />
                  </div>
                  <button type="button" id="genFile_submit" class="btn btn-lg btn-danger">Create File</button>
                </form>

              </div>
            </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark btn-lg" data-dismiss="modal">Close</button>
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
          .
          <div class="container-fluid text-center">
            <div class="row " id="genUser_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="genUser_form" method="POST" role="form" action="./adminUser.php">
                  <div class="form-group">
                    <label for="uname">Full Name:</label>
                    <input class="form-control" name="uname" id="uname" placeholder="Enter Your Full Name (Surname First)" type="text" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="fathers_name">Fathers Name:</label>
                    <input class="form-control" name="fathers_name" id="fathers_name" type="text" required />
                  </div>
                  <div class="form-group">
                    <label for="mothers_name">Mothers Name:</label>
                    <input class="form-control" name="mothers_name" id="mothers_name" type="text" required />
                  </div>
                  <div class="form-group">
                    <label for="udept">Department:</label>
                    <select name="udept" class="form-control">
                      <?php       
                    $askdb = "SELECT * FROM departments WHERE `branch_id` = '$branch_id'";
                    $ansdb = $link->query($askdb);
                    if (mysqli_query($link, $askdb)) {
                      if (mysqli_num_rows($ansdb) > 0) {
                        while ($option = mysqli_fetch_assoc($ansdb)) {
                          echo " <option value='" . $option["dept_name"] . "'>
                            " . $option["dept_name"] . "
                            </option>";
                        }
                      }
                    }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date" required />
                  </div>
                  <div class="form-group">
                    <label for="gender_type">Gender:</label>
                    <select name="gender_type" class="form-control">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="mobile">Telephone No:</label>
                    <input class="form-control" name="mobile" id="mobile" placeholder="08145126202" type="number" required />
                  </div>
                  <div class="form-group">
                    <label for="present_address">Present Address:</label>
                    <textarea name="present_address" colspan="5" id="present_address" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="permanent_address">Permanent Address:</label>
                    <textarea class="form-control" colspan="5" name="permanent_address" id="permanent_address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="uemail">Email Address:</label>
                    <input class="form-control" name="uemail" id="uemail" placeholder="Enter Your Email Address" type="email" required/>
                  </div>
                  <div class="form-group">
                    <label for="upwd1">Password:</label>
                    <input class="form-control" name="upwd1" id="upwd1" placeholder="Password" type="password" required/>
                  </div>
                  <div class="form-group">
                    <label for="upwd2">Confirm Password:</label>
                    <input class="form-control" name="upwd2" id="upwd2" placeholder="Confirm Password" type="password" required />
                  </div>
                  <button type="button" id="genUser_form_button" onclick="submitCall('genUser')" class="btn btn-lg btn-dark">Create Account</button>
                </form>
              </div>
            </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark btn-lg" data-dismiss="modal">Close</button>
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
            <div class="row " id="genDept_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="genDept_form" method="POST" role="form" action="./adminDept.php">
                  <div class="form-group">
                    <label for="dname">Department Name:</label>
                    <input type="text" class="form-control" placeholder="Input Department Name" name="dname" id="dname" />
                  </div>
                  <button type="button" id="genDept_form_button" class="btn btn-lg btn-dark" onclick="submitCall('genDept')">Register</button>
                </form>
              </div>
            </div>
          </div>..
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark btn-lg" data-dismiss="modal">Close</button>
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
            <div class="row response4"></div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md">
                <table class="table">
                  <thead>
                  <tr>
                    <th>
                      File Sub
                    </th>
                    <th>
                      File Ref
                    </th>
                    <th>
                      Dept
                    </th>
                    <th>
                      Status
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query1 = "SELECT * FROM `incoming_file`";
                      $result1 = $link->query($query1);
                      if (mysqli_query($link, $query1)) {
                        if (mysqli_num_rows($result1) > 0) {
                          while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<tr>
                            <td>" . $row["file_subject"] ."</td>
                            <td>" . $row["file_reference"] ."</td>
                            <td>" . $row["dept_to"] ."</td>
                            <td>" . $row["status"] ."</td>
                            <td><form action='./archiveFile.php' method='POST'>
                            <button type='submit' id='arFile' name='arFile'  value='" . $row["id"] . "' class='btn btn-sm btn-danger'>
                            Archive File</button>
                            </form></td>
                            <td><form action='./historyFile.php' method='POST'>
                            <button type='submit' class='btn btn-sm btn-info' id='hFile' name='hFile' value = '" . $row["file_reference"] . "'>
                            View History</button>
                            </form></td>
                            </tr>";
                          }
                        }
                      }?>
                  </tbody>
                  
                </table>
              </div>  
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark btn-lg" data-dismiss="modal">Close</button>
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
              <div class="col-md">
                <table class="table">
                  <tr>
                    <th>
                      <h4>Full name</h4>
                    </th>
                    <th>
                      <h4>Email</h4>
                    </th>
                    <th>
                      <h4>Dept.</h4>
                    </th>
                    <th>
                      <h4>Status</h4>
                    </th>
                  </tr>
                  <?php
                  $queryi = "SELECT * FROM `employees`";
                  $resulti = $link->query($queryi);
                  if (mysqli_query($link, $queryi)) {
                    if (mysqli_num_rows($resulti) > 0) {
                      while ($rowi = mysqli_fetch_assoc($resulti)) {
                        echo "<tr>
                          <td>
                          " . $rowi["full_name"] . "
                          </td>
                          <td>
                          " . $rowi["email"] . "
                          </td>
                          <td>
                          " . $rowi["department"] . "
                          </td>
                          <td>
                          " . $rowi["status"] . "
                          </td>
                          <td>
                          <form action='./updateUser.php' method='POST'>
                          <button type='submit' id='upUser' name='upUser' value='" . $rowi["employee_id"] . "' class='btn btn-warning'>Edit</button>
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
              <div class="col-md">
                <table class="table">
                  <tr>
                    <th>
                      <h4>Department Name</h4>
                    </th>
                  </tr>
                  <?php
                  $query3 = "SELECT * FROM `departments` WHERE `branch_id`='$branch_id'";
                  $result3 = $link->query($query3);
                  if (mysqli_query($link, $query3)) {
                    if (mysqli_num_rows($result3)) {
                      while ($row2 = mysqli_fetch_assoc($result3)) {
                        echo "<tr><td>" . $row2["dept_name"] . "</td><td class='text-center'><form action='./updateDept.php' method='POST'><button type='submit' id='upDept' name='upDept' value='" . $row2["dept_id"] . "' class='btn btn-warning'>Edit</button></td></tr>";
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