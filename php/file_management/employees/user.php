<?php
  include '../../actions/conn.php';
  session_start();
  $userId = $_SESSION['id'];
  $branchId = $_SESSION['branch_id'];

  $query = "SELECT * FROM `employees` WHERE `employee_id` = '$userId' LIMIT 1 ";
  $bquery = "SELECT * FROM `branchs` WHERE `branch_id` = '$branchId' LIMIT 1";
  $result = mysqli_query($link,$query);
  $bresult = mysqli_query($link,$bquery);
  $brow = mysqli_fetch_array($bresult);
  $row = mysqli_fetch_array($result);
  $nameDisplay = $row['full_name'];
  $deptDisplay = $row['department'];
  $branchDisplay = $brow['name'];
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/ajaxhelper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <script>alert("Refresh to view Changes after any action");</script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
      <h1 class="navbar-brand">Welcome <?php echo " ".$nameDisplay." in ".$deptDisplay."  Department"; ?></h1>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../../login_page.php?logout=1">Logout</a>
        </li>
      </ul>
      </div>
    </nav>
    <div class="container text-center" style="margin-top:100px;">
      <br/><br/><br/>
      <h2>Incoming/Outgoing Management</h2>
        <br/>
      <div class="row text-center" >
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#fI">Incoming</button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#fO">Outgoing</button>
        </div>
      </div>
      <h2>Broadcast</h2>
        <br/>
      <div class="row text-center">
        
        <div class="col-md text-center">
           <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#broad">Broadcast</button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="fI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" >Incoming</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            .<div class="container-fluid">
                <div class="row">
                  <div class="table-responsive">
                    <table class="table-bordered table table-hover">
                      <tr>
                        <th>
                          File Reference
                        </th>
                        <th>
                          File Subject
                        </th>
                        <th>
                          Date Created
                        </th>
                      </tr>
                      <?php
                        $query0 = "SELECT * FROM incoming_file WHERE `dept_to`='$deptDisplay' AND `status`='Active' and `branch_id` = '$branchId'";
                        $result0 = $link->query($query0);
                        if(mysqli_query($link,$query0)){
                          if(mysqli_num_rows($result0) > 0){
                            while ($row0 = mysqli_fetch_assoc($result0)){
                              echo "<tr>
                              <td>
                                <h5>".$row0["file_reference"]."</h5></td>
                              <td>
                                <h5>".$row0["file_subject"]."</h5>
                              </td>
                              <td>
                                <h5>".$row0["date"]."</h5>
                              </td>
                              <td>
                                <form action='./user2.php' method='POST'>
                                <button id='accsubmit' class='btn btn-success' name='accsubmit' value='".$row0['file_reference']."'>Accept File</button>
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
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="fO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" >Outgoing</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid text-center">
                <div class="row">
                  <h3>Accepted List</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th>
                          File Reference
                        </th>
                        <th>
                          File Subject
                        </th>
                        <th>
                          Start Page
                        </th>
                        <th>
                          Stop Page
                        </th>
                        <th>
                          Dept From:
                        </th>
                        <th>
                          Remarks
                        </th>
                        <th>
                          Date Created
                        </th>
                      </tr>
                      <?php
                        $query1 = "SELECT * FROM `incoming_file` WHERE `dept_to`='$deptDisplay' AND `status`='Approved' AND `branch_id`='$branchId'";
                        $result1 = $link->query($query1);
                        if(mysqli_query($link,$query1)){
                          if(mysqli_num_rows($result1) > 0){
                            while($row1= mysqli_fetch_assoc($result1)){
                              echo "<tr>
                                <td>
                                  ".$row1["file_reference"]."
                                </td>
                                <td>
                                  ".$row1["file_subject"]."
                                </td>
                                <td>
                                  ".$row1["start_page"]."
                                </td>
                                <td>
                                  ".$row1["stop_page"]."
                                </td>
                                <td>
                                  ".$row1["dept_from"]."
                                </td>
                                <td>
                                  ".$row1["file_remarks"]."
                                </td>
                                <td>
                                  ".$row1["date"]."
                                </td>
                                <td>
                                  <form action='./postUser.php' method='POST'>
                                    <button type='submit' class='btn btn-success' name='psubmit' value='".$row1["id"]."' id='psubmit'>Transfer File</button>
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
            </div>
            <div class="container-fluid text-center">
              <div class="row">
                <h3>Outwards List</h3>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th>
                        File Reference
                      </th>
                      <th>
                        File Subject
                      </th>
                      <th>
                        Start Page
                      </th>
                      <th>
                        Stop Page
                      </th>
                      <th>
                        File Remarks
                      </th>
                      <th>
                        Dept To
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Folio Out
                      </th>
                      <th>
                        Date
                      </th>
                    </tr>
                    <?php
                      $query2="SELECT * FROM `outgoing_file` WHERE `dept_from`='$deptDisplay' and `branch_id`='$branchId'";
                      $result2= $link->query($query2);
                      if(mysqli_query($link,$query2)){
                        if(mysqli_num_rows($result)> 0){
                          while($row2 = mysqli_fetch_assoc($result2)){
                            echo "<tr>
                            <td>
                              ".$row2["file_reference"]."
                            </td>
                            <td>
                              ".$row2["file_subject"]."
                            </td>
                            <td>
                              ".$row2["start_page"]."
                            </td>
                            <td>
                              ".$row2["stop_page"]."
                            </td>
                            <td>
                              ".$row2["file_remarks"]."
                            </td>
                            <td>
                              ".$row2["dept_to"]."
                            </td>
                            <td>
                              ".$row2["status"]."
                            </td>
                            <td>
                              ".$row2["folioout"]."
                            </td>
                            <td>
                              ".$row2["date"]."
                            </td>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="broad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Broadcast Management</h2>
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
                      Title
                    </th>
                    <th>
                      Message
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Date Created
                    </th>
                  </tr>
                  <?php
                  $queryi = "SELECT * FROM `broadcast` WHERE `branch_id`='$branch_id' AND (`status`='Branch' OR `status`='General')";
                  $resulti = $link->query($queryi);
                  if (mysqli_query($link, $queryi)) {
                    if (mysqli_num_rows($resulti) > 0) {
                      while ($rowi = mysqli_fetch_assoc($resulti)) {
                        echo "<tr>
                          <td>
                          " . $rowi["title"] . "
                          </td>
                          <td>
                          " . $rowi["message"] . "
                          </td>
                          <td>
                          " . $rowi["status"] . "
                          </td>
                          <td>
                          " . $rowi["creation_date"] . "
                          </td>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </body>

</html>
