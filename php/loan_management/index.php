<?php
 require '../actions/conn.php';
 session_start();
 extract($_SESSION);
?>
<!Doctype html>
  <html lang="en">

  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Management</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="./js/jquery-3.3.1.min.js">
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ajaxhelper.js"></script>
    <script>
      alert('Refresh after actions to view changes');
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
      <h1 class="navbar-brand">Welcome Loan Management Admin</h1>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../actions/login.php?logout=1">Logout</a>
        </li>
      </ul>
      </div>
    </nav>
    <br/>
    <br/>
    <div class="container text-center">
      <br/>
      <h1>Management</h1>
      <br/>
      <div class="row">
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#penLoan">
            Pending Loans
          </button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#accLoan">
            Accepted Loans
          </button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#expLoan">
            Expired Loans
          </button>
        </div>
      </div>
    </div>
  </body>
  <div class="modal fade" id="penLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Pending Loans</h2>
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
                      Account Holder
                    </th>
                    <th>
                      Loan Amount
                    </th>
                    <th>
                      Loan Description
                    </th>
                    <th>
                      Interest
                    </th>
                    <th>
                      Guarantor
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query1 = "SELECT * FROM `admin_loan` WHERE `branch_id`='$branch_id' AND `status`='Pending'";
                      $result1 = $link->query($query1);
                      if (mysqli_query($link, $query1)) {
                        if (mysqli_num_rows($result1) > 0) {
                          while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<tr>
                            <td>" . $row["account_name"] ."</td>
                            <td>" . $row["loan_amount"] ."</td>
                            <td>" . $row["loan_description"] ."</td>
                            <td>" . $row["interest"] ."</td>
                            <td>" . $row["full_name"] ."</td>
                            <td><form action='./archiveFile.php' method='POST'>
                            <button type='submit' id='arFile' name='arFile'  value='" . $row["id"] . "' class='btn btn-sm btn-danger'>
                            Aprrove</button>
                            </form></td>
                            <td><form action='./historyFile.php' method='POST'>
                            <button type='submit' class='btn btn-sm btn-info' id='hFile' name='hFile' value = '" . $row["file_reference"] . "'>
                            Decline</button>
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
  <div class="modal fade" id="accLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Approved Loans</h2>
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
                  <thead>
                  <tr>
                    <th>
                      Account Holder
                    </th>
                    <th>
                      Loan Amount
                    </th>
                    <th>
                      Loan Description
                    </th>
                    <th>
                      Interest
                    </th>
                    <th>
                      Guarantor
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query4 = "SELECT * FROM `admin_loan` WHERE `branch_id`='$branch_id' AND `status`='Approved'";
                      $result4 = $link->query($query4);
                      if (mysqli_query($link, $query4)) {
                        if (mysqli_num_rows($result4) > 0) {
                          while ($row4 = mysqli_fetch_assoc($result4)) {
                            echo "<tr>
                            <td>" . $row4["account_name"] ."</td>
                            <td>" . $row4["loan_amount"] ."</td>
                            <td>" . $row4["loan_description"] ."</td>
                            <td>" . $row4["interest"] ."</td>
                            <td>" . $row4["full_name"] ."</td>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="expLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Expired Loans</h2>
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
                  <thead>
                  <tr>
                    <th>
                      Account Holder
                    </th>
                    <th>
                      Loan Amount
                    </th>
                    <th>
                      Loan Description
                    </th>
                    <th>
                      Interest
                    </th>
                    <th>
                      Guarantor
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query5 = "SELECT * FROM `admin_loan` WHERE `branch_id`='$branch_id' AND `status`='Approved'";
                      $result5 = $link->query($query5);
                      if (mysqli_query($link, $query5)) {
                        if (mysqli_num_rows($result5) > 0) {
                          while ($row5 = mysqli_fetch_assoc($result5)) {
                            echo "<tr>
                            <td>" . $row5["account_name"] ."</td>
                            <td>" . $row5["loan_amount"] ."</td>
                            <td>" . $row5["loan_description"] ."</td>
                            <td>" . $row5["interest"] ."</td>
                            <td>" . $row5["full_name"] ."</td>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </html>