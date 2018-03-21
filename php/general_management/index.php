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
        <title>General Management</title>
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
                    success: function(data, textStatus, jqXHR) {
                        $(x + '_button').hide();
                        $(x + '_response').html(data);
                        $(x + '_response').focus();
                        console.log(data);
                    },
                    error: function(jqXHR, status, error) {
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
            <h1 class="navbar-brand">Welcome General Manager</h1>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../login_page.php?logout=1">Logout</a>
                </li>
            </ul>
            </div>
        </nav>
        <br/>
        <br/>
        <div class="container text-center">
            <br/><br/><br/>
            <h1>Creation</h1>
            <br/>
            <div class="row">
                <div class="col-md text-center">
                    <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#genBra">

            Branch
          </button>
                </div>
                <div class="col-md text-center">
                    <button type="button" class="btn btn-dark btn-lg text-center" data-toggle="modal" data-target="#genBram">

            Branch Managers
          </button>
                </div>
            </div>
        </div>
    </body>
    <div class="modal fade" id="genBra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Register Branch</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid text-center">
                        <div class="row " id="genBra_form_response">

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <form id="genBra_form" method="POST" role="form" action="./genBra.php">
                                    <div class="form-group">
                                        <label for="name">Branch Name:</label>
                                        <input class="form-control" name="name" id="name" type="text" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_no">Contact Number:</label>
                                        <input class="form-control" name="contact_no" id="contact_no" type="text" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_email">Contact Email:</label>
                                        <input class="form-control" name="contact_email" id="contact_email" type="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" colspan="5" id="address" class="form-control" required></textarea>
                                    </div>
                                    <button type="button" id="genBra_form_button" onclick="submitCall('genBra')" class="btn btn-lg btn-dark">Create Branch</button>
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
    <div class="modal fade" id="genBram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Register Branch Manager</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid text-center">
                        <div class="row " id="genBram_form_response">

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <form id="genBram_form" method="POST" role="form" action="./php/genBram.php">
                                    <div class="form-group">
                                        <label for="uname">Full Name:</label>
                                        <input class="form-control" name="uname" id="uname" placeholder="Enter Your Full Name (Surname First)" type="text" required />
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
                                        <input class="form-control disabled" name="udept" id="udept" type="text" value="General" />
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
                                        <label for="branch_id">Branch:</label>
                                        <select name="branch_id" class="form-control">
                                          <?php
$q = "SELECT * FROM `branchs`";
$result = mysqli_query($link, $q);
while ($row1 = mysqli_fetch_assoc($result)) {
    echo "<option value=" . $row1['branch_id'] . ">" . $row1['name'] . "</option>";
}
?>
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
                                    <button type="button" id="genBram_form_button" onclick="submitCall('genBram')" class="btn btn-lg btn-dark">Create Account</button>
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
    </html>