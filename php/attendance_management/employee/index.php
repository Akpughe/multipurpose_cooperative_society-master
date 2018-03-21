<?php
require '../../actions/conn.php';
session_start();
print_r($_SESSION);
extract($_SESSION);

?>
 <!Doctype html>
  <html lang="en">
  <head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js">
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ajaxhelper.js"></script>
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
      <h1 class="navbar-brand">Welcome Attendance Admin</h1>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../../../login_page.php?login=1">Logout</a>
        </li>
      </ul>
      </div>
    </nav>
    <br/>
    <br/>
    <div class="container text-center">
    </div>
  </body>
  </html>
