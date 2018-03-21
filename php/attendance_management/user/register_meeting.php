<?php
require '../../actions/conn.php';
require './meeting.php';

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login to Meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/index.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" id="navbar">
  <a class="navbar-brand" href="#">LOGIN TO MCS MEETING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav mr-auto">

    </ul>
  </div>
</nav>
<br/> <br/><br/>
<div class="container  text-center">
      <div class="row">
        <div class="col-md" >
          <h1>Multipurpose Co-operative Society Meeting Login</h1>
          <br/>
          <form method="POST" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php if ($result) {
    echo $result;
}

if ($message) {
    echo $message;
}
?>
            <div class="form-group">
              <label for="meeting_id">Meeting ID:</label>
              <input type="text" class="form-control" name="meeting" id="meeting_id"/>
            </div>
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" name="pwd" id="pwd" />
            </div>
            <div class="form-group text-center">
                <label for="type">User Type:</label>
                <select class="form-control text-center" id="type" name="type">
                    <option value="user"><h5>USER</h5></option>
                    <option value="employee"><h5>STAFF</h5></option>
                </select>
            </div>
            <button type="submit" name="login" value="login" class="btn btn-lg btn-dark">Login</button>
            <a href="./register_meeting.php?logout=1" class="btn btn-lg btn-dark">Logout</a>
          </form>
        </div>
      </div>
    </div>
</body>
</html>