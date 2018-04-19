<?php
require '../actions/conn.php';
session_start();
extract($_SESSION);
$q1 = "SELECT * FROM `account_holders` WHERE `account_holder_id`='$account_holder_id' LIMIT 1";
$res = mysqli_query($link, $q1);
$row1 = mysqli_fetch_assoc($res);
?>
<!Doctype html>
  <html lang="en">

  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCS USER</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.3.1.min.js">
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ajaxhelper.js"></script>
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
      <h1 class="navbar-brand">Welcome <?php echo $row1['full_name']; ?></h1>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../login_page.php?logout=1">Logout</a>
        </li>
      </ul>
      </div>
    </nav>
    <br/>
    <br/>
    <div class="container text-center" style="margin-top:100px;">
      <br/>
      <div class="row">
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#genLoan">
            Request For Loan
          </button>
        </div>
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#userProfile">
            Profile
          </button>
        </div>
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#viewBroad">
            View Broadcasts
          </button>
        </div>
      </div>
      <hr/>
      <div class="row">
        <br/>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#viewLoan">
            View Loans
          </button>
        </div>
        <div class="col-md text-center">
          <a class="btn btn-dark btn-lg text-center" href="../attendance_management/user/register_meeting.php">
            Meetings Login
          </a>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#genGrant">
            Guarantor Register
          </button>
        </div>
      </div>
    </div>
  </body>
  <div class="modal fade" id="genLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Apply for Loan</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response" id="genLoan_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="genLoan_form" method="POST" role="form" action="./genLoan.php">
                  <div class="form-group">
                    <label for="loan_amount">Loan Amount:</label>
                    <select name="loan_amount" class="form-control">
                       <option value="a">NGN500,000/6 Months/0.5% Interest</option>
                       <option value="b">NGN2,000,000 /2 Years/1.5% Interest</option>
                       <option value="c">NGN10,000,000/5 Years/3.5% Interest</option>
                       <option value="d">NGN45,000,000/10 Years/5.0% Interest</option>
                    </select>
                  </div>
                  <div class="form-group">
              <input type="text" class="form-control" name="account_holder_id" id="account_holder_id" value="<?php echo $account_holder_id; ?>"
              style="display:none;" />
            </div>
                  <div class="form-group">
                    <label for="loan_description">Loan Description:</label>
                    <textarea class="form-control" name="loan_description" id="loan_description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="guarantor_id">Guarantor:</label>
                    <select name="guarantor_id" id="guarantor_id" class="form-control">
                      <?php
$askdb = "SELECT * FROM `guarantors` WHERE `account_holder_id` = '$account_holder_id' ";
$ansdb = $link->query($askdb);
if (mysqli_query($link, $askdb)) {
    if (mysqli_num_rows($ansdb) > 0) {
        while ($option = mysqli_fetch_assoc($ansdb)) {
            echo " <option value='" . $option["guarantor_id"] . "'>
                              " . $option["full_name"] . "
                              </option>";
        }
    }
}
?>
                    </select>
                  </div>
                  <button type="button" id="genLoan_submit" class="btn btn-lg btn-danger" onclick="submitCall('genLoan')">Submit Request</button>
                </form>
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
  <div class="modal fade" id="userProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Update Profile</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="container-fluid text-center">
            <h5>Change to new values. Leave values if you wish to maintain them</h5>
            <div class="row " id="updateProfile_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="updateProfile_form" method="POST" role="form" action="./updateProfile.php">
          <div class="form-group">
              <label for="full_name">Full Name:</label>
              <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $row1['full_name']; ?>" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="account_holder_id" id="account_holder_id" value="<?php echo $row1['account_holder_id']; ?>"
              style="display:none;" />
            </div>
            <div class="form-group">
              <label for="telephone">Telephone No:</label>
              <input type="number" class="form-control" name="telephone" id="telephone" value="<?php echo $row1['telephone']; ?>"  />
            </div>
            <div class="form-group">
              <label for="present_address">Present Address:</label>
              <textarea name="present_address" colspan="5" id="present_address" class="form-control" value="<?php echo $row1['present_address']; ?>"></textarea>
            </div>
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $row1['email']; ?>" />
            </div>
            <div class="form-group">
              <label for="branch_id">Branch:</label>
              <select class="form-control text-center" name="branch_id" id="branch_id">
              <?php
$bq = "SELECT * FROM `branchs`";
$r = mysqli_query($link, $bq);
if (mysqli_num_rows($r) > 0) {
    while ($brow = mysqli_fetch_assoc($r)) {
        echo '<option value=' . $brow["branch_id"] . '><h6>' . $brow["name"] . ' @ ' . $brow["address"] . '</h6></option>';
    }
}
?>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" value="<?php echo $row1['password']; ?>" />
            </div>
                  <button type="button" id="updateProfile_form_button" onclick="submitCall('updateProfile')" class="btn btn-lg btn-dark">Update Profile</button>
                </form>
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
  <div class="modal fade" id="viewBroad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">View Broadcast Message</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row">
              <div class="col-md">
              <table class="table">
                  <thead>
                  <tr>
                    <th>
                      Title
                    </th>
                    <th>
                      Message
                    </th>
                    <th>
                      Date
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$que = "SELECT * FROM `broadcast` WHERE `status`='General' OR `status`='Branch' AND `branch_id`='$branch_id'";
$res = $link->query($que);
if (mysqli_query($link, $que)) {
    if (mysqli_num_rows($res) > 0) {
        while ($rw = mysqli_fetch_assoc($res)) {
            echo "<tr>
                            <td>" . $rw["title"] . "</td>
                            <td>" . $rw["message"] . "</td>
                            <td>" . $rw["date"] . "</td>
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
  <div class="modal fade" id="viewLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">View Loans</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md">
                <table class="table">
                  <thead>
                  <tr>
                    <th>
                      Amount
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      Interest
                    </th>
                    <th>
                      Start Date
                    </th>
                    <th>
                      Expiry
                    </th>
                    <th>
                      File Reference
                    </th>
                    <th>
                      Guarantor
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$q2 = "SELECT * FROM `users_loan` WHERE `account_holder_id`='$account_holder_id'";
$res2 = $link->query($q2);
if (mysqli_query($link, $q2)) {
    if (mysqli_num_rows($res2) > 0) {
        while ($row3 = mysqli_fetch_assoc($res2)) {
            echo "<tr>
                            <td>" . $row3["loan_amount"] . "</td>
                            <td>" . $row3["loan_description"] . "</td>
                            <td>" . $row3["interest"] . "</td>
                            <td>" . $row3["loan_start"] . "</td>
                            <td>" . $row3["loan_stop"] . "</td>
                            <td>" . $row3["file_reference"] . "</td>
                            <td>" . $row3["full_name"] . "</td>
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
  <div class="modal fade" id="genGrant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Register Guarantor</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid text-center">
            <div class="row response5" id="genGrant_form_response">

            </div>
          </div>
          <div class="container-fluid text-center">
          <form id="genGrant_form" method="POST" role="form" action="./genGrant.php">
                  <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input class="form-control" name="full_name" id="full_name" placeholder="Enter Your Full Name (Surname First)" type="text" required
                    />
                  </div>
                  <div class="form-group">
              <input type="text" class="form-control" name="account_holder_id" id="account_holder_id" value="<?php echo $account_holder_id; ?>"
              style="display:none;" />
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
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date" required />
                  </div>
                  <div class="form-group">
                    <label for="mobile">Telephone No:</label>
                    <input class="form-control" name="mobile" id="mobile" placeholder="08145126202" type="number" required />
                  </div>
                  <div class="form-group">
                    <label for="permanent_address">Permanent Address:</label>
                    <textarea class="form-control" colspan="5" name="permanent_address" id="permanent_address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="relation">Relationship:</label>
                    <input class="form-control" name="relation" id="relation" type="text" required/>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input class="form-control" name="email" id="email" placeholder="Enter Your Email Address" type="email" required/>
                  </div>
                  <button type="button" id="genGrant_form_button" onclick="submitCall('genGrant')" class="btn btn-lg btn-dark">Create Account</button>
                </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </html>