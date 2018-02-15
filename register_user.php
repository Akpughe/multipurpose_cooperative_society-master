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
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/index.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" id="navbar">
  <a class="navbar-brand" href="#">Registration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
    </ul>
  </div>
</nav> 
<br/> 
<div class="container text-center">
<h1>Welcome to Multipurpose Co-operative Society</h1>
<br/>
        <?php if ($result) echo $result;
        if ($message) echo $message; ?>
  <div class="row">
        <div class="col-md"> 
          <form method="POST" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-group">
              <label for="email">Full Name:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Father Name:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Mother Name:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Date Of Birth:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Gender:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
        </div>
        <div class="col-md">
         <div class="form-group">
              <label for="email">Telephone No:</label>
              <input type="email" class="form-control" name="email" id="email" />
         </div>
            <div class="form-group">
              <label for="email">Present Address:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Permanent Address:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" name="pwd" id="pwd" />
            </div>
            <button type="submit" class="btn btn-lg btn-dark">Login</button>
            </form>
        </div>
  </div>
</div>
</body>
</html>