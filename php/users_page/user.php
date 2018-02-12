<?php
  include '../actions/conn.php';
  session_start();
  $userId=$_SESSION['id'];

  $query = "SELECT * FROM `users` WHERE `id` ='$userId' LIMIT 1 ";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  $nameDisplay = $row['username'];
  $deptDisplay = $row['department'];
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
    <link rel="stylesheet" href="../../css/styles.css">
    <style>
      .container{
        width:auto;
        height:auto;
        margin:0 auto;
      }
      body {
        background-color:#102334;
        height:100%;
        width:100%;
      }

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
    <script>alert("Refresh to view Changes after any action");</script>
  </head>
  <body>
    <nav class="navbar navbar-inverse ">
      <div class="container-fluid text-center">
        <div class="navbar-header">
          <h1 class="navh1 ">Welcome <?php echo " ".$nameDisplay."<h4 > in ".$deptDisplay."  Department</h4>"; ?></h1>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../../index.php?logout=1"> Logout</a></li>
        </ul>

      </div>
    </nav>
    <div class="container">
      <div class="row text-center">
        <h1>Incoming/Outgoing Management</h1>
        <div class="col-md-6 text-center">
          <button type="button" class="btn btn-default btn-mda text-center" data-toggle="modal" data-target="#fI"><span class="glyphicon glyphicon-log-in icona"></span><h1>Incoming</h1></button>
        </div>
        <div class="col-md-6 text-center">
          <button type="button" class="btn btn-default btn-mda text-center" data-toggle="modal" data-target="#fO"><span class="glyphicon glyphicon-log-out icona"></span><h1>Outgoing</h1></button>
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
                          <h4>File Reference</h4>
                        </th>
                        <th>
                          <h4>File Subject</h4>
                        </th>
                        <th>
                          <h4>Date Created</h4>
                        </th>
                      </tr>
                      <?php
                        $query0 = "SELECT * FROM incoming WHERE `dept_to`='$deptDisplay' AND `status`='Active'";
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
            </div>..
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
            <h2 class="modal-title" >Outgoing</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            .<div class="container-fluid text-center">
                <div class="row">
                  <h2>Accepted List</h2>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th>
                          <h4>File Reference</h4>
                        </th>
                        <th>
                          <h4>File Subject</h4>
                        </th>
                        <th>
                          <h4>Start Page</h4>
                        </th>
                        <th>
                          <h4>Stop Page</h4>
                        </th>
                        <th>
                          <h4>Dept From:</h4>
                        </th>
                        <th>
                          <h4>Remarks</h4>
                        </th>
                        <th>
                          <h4>Date Created</h4>
                        </th>
                      </tr>
                      <?php
                        $query1 = "SELECT * FROM `incoming` WHERE `dept_to`='$deptDisplay' AND `status`='Approved'";
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
                <h2>Outwards List</h2>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th>
                        <h4>File Reference</h4>
                      </th>
                      <th>
                        <h4>File Subject</h4>
                      </th>
                      <th>
                        <h4>Start Page</h4>
                      </th>
                      <th>
                        <h4>Stop Page</h4>
                      </th>
                      <th>
                        <h4>File Remarks</h4>
                      </th>
                      <th>
                        <h4>Dept To</h4>
                      </th>
                      <th>
                        <h4>Status</h4>
                      </th>
                      <th>
                        <h4>Folio Out</h4>
                      </th>
                      <th>
                        <h4>Date</h4>
                      </th>
                    </tr>
                    <?php
                      $query2="SELECT * FROM `outgoing` WHERE `dept_from`='$deptDisplay'";
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
  </body>

</html>
