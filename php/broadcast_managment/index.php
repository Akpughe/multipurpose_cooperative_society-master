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
    <title>Broadcast Management</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
      <h1 class="navbar-brand">Welcome Broadcast Manager</h1>
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
      <h1>Creation</h1>
      <br/>
      <div class="row">
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#genMet">
            <h1>Meeting</h1>
          </button>
        </div>
        <div class="col-md text-center">
          <button type="button" class="btn btn-dark btn-md text-center" data-toggle="modal" data-target="#genBroad">
            <h1>Broadcast</h1>
          </button>
        </div>
      </div>
    </div>
  </body>
  <div class="modal fade" id="genMet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Create Meeting</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          .
          <div class="container-fluid text-center">
            <div class="row response" id="genMet_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="genMet_form" method="POST" role="form" action="./php/genMeeting.php">
                  <div class="form-group">
                    <label for="info">Meeting Title</label>
                    <input class="form-control" name="info" id="info" type="text" placeholder="Title of the Meeting" />
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="branch_id" value="<?php echo $branch_id; ?>"  id="branch_id" type="text" style="display:none;" />
                  </div>
                  <div class="form-group">
                    <label for="venue">Venue Description</label>
                    <textarea name="venue" colspan="5" id="venue" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="date_time">Date and Time</label>
                    <input class="form-control" name="date_time" placeholder="Scheduled Date and Time" id="date_time" type="datetime" />
                  </div>
                  <button type="button" id="genMet_submit" class="btn btn-lg btn-danger" onclick="submitCall('genMet')">Create File</button>
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
  <div class="modal fade" id="genBroad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="row " id="genBroad_form_response">

            </div>
            <div class="row">
              <div class="col-md">
                <form id="genBroad_form" method="POST" role="form" action="./adminBroad.php">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" name="title" id="title" placeholder="Broadcast Title" type="text" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="status">Share With:</label>
                    <select name="status" class="form-control">
                      <option value="General">Every one in Branch</option>
                      <option value="Managers">Branch/General Managers</option>
                      <option value="Branch">Employees of Branch</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" colspan="5" id="message" class="form-control" required></textarea>
                  </div>
                  <button type="button" id="genBroad_form_button" onclick="submitCall('genBroad')" class="btn btn-lg btn-dark">Create Account</button>
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
  </html>