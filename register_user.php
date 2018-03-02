<?php
include './php/actions/conn.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register to MCS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/ajaxhelper.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top text-center" id="navbar">
  <a class="navbar-brand" href="#">REGISTRATION</a>
</nav> 
<br/><br/>
<div class="container text-center">
  <br/><br/>
  <h1>Welcome to Multipurpose Co-operative Society</h1>
  <br/>
  <h6>You are about to be part of something big that'll revolutionize your life.</h6>
   <br/>
   <hr/>
   <div id="register_form_response"></div>
  <div class="row">
        <div class="col-md"> 
          <form method="POST" id="register_form" role="form" action="./php/actions/register.php///">
          <div class="form-group">
              <label for="full_name">Full Name:</label>
              <input type="text" class="form-control" name="full_name" id="full_name" required placeholder="John Doe" />
            </div>
            <div class="form-group">
              <label for="father_name">Father Name:</label>
              <input type="text" class="form-control" name="father_name" id="father_name" required />
            </div>
            <div class="form-group">
              <label for="mother_number">Mother Name:</label>
              <input type="text" class="form-control" name="mother_name" id="mother_name" required/>
            </div>
            <div class="form-group">
              <label for="birthdate">Date Of Birth:</label>
              <input type="date" class="form-control" name="birthdate" id="birthdate" required />
            </div>
            <div class="form-group">
              <label for="gender">Gender:</label>
              <select class="form-control text-center" name="gender" id="gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="telephone">Telephone No:</label>
              <input type="number" class="form-control" name="telephone" id="telephone" required placeholder="08145126202" max-length="11" />
         </div>
        </div>
        <div class="col-md">
        
        <div class="form-group">
              <label for="present_address">Present Address:</label>
              <textarea name="present_address" colspan="5" id="present_address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="permanent_address">Permanent Address:</label>
              <textarea class="form-control" colspan="5" name="permanent_address" id="permanent_address" required></textarea>
            </div>
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="any@any.com" />
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
              <input type="password" class="form-control" name="password" id="password" required />
            </div>
            </form>
        </div>   
  </div>
  <hr/>
  <div class="row">
    <div class="col-md">
    <button type="button" class="btn btn-lg btn-dark" id="register_form_button" onclick="submitCall('register')">Login</button>
    </div>
  </div>
</div>
</body>
</html>
