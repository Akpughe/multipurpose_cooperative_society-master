<!Doctype html >
<html lang="en">
  <head>

  <meta charset=utf-8 />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>File History</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <script src="../../js/jQuery.js"></script>
       <script src="../../js/bootstrap.min.js"></script>
      <style>

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
  </head>
  <body>
    <h2 class="text-center">File History</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <tr>
              <th>
                <h3>File Reference</h3>
              </th>
              <th>
                <h3>File Subject</h3>
              </th>
              <th>
                <h3>Date</h3>
              </th>
              <th>
                <h3>Action Performed</h3>
              </th>
              <th>
                <h3>Dept From</h3>
              </th>
              <th>
                <h3>Dept To</h3>
              </th>
              <th>
                <h3>User From</h3>
              </th>
              <th>
                <h3>Start Page</h3>
              </th>
              <th>
                <h3>Stop Page</h3>
              </th>
              <th>
                <h3>File Remarks</h3>
              </th>
              <th>
                <h3>Status</h3>
              </th>
              <th>
                <h3>Folio Out</h3>
              </th>
            </tr>
            <?php
              include '../actions/conn.php';
              $hFile= $_POST["hFile"];

              if($hFile){
                $query="SELECT * FROM `history` WHERE `file_reference`='$hFile'";
                $result= $link->query($query);
                if(mysqli_query($link,$query)){
                  if(mysqli_num_rows($result)> 0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<tr>
                      <td>
                        ".$row["file_reference"]."
                      </td>
                      <td>
                        ".$row["file_subject"]."
                      </td>
                      <td>
                        ".$row["date"]."
                      </td>
                      <td>
                        ".$row["action"]."
                      </td>
                      <td>
                        ".$row["dept_from"]."
                      </td>
                      <td>
                        ".$row["dept_to"]."
                      </td>
                      <td>
                        ".$row["user"]."
                      </td>
                      <td>
                        ".$row["start_page"]."
                      </td>
                      <td>
                        ".$row["stop_page"]."
                      </td>
                      <td>
                        ".$row["file_remarks"]."
                      </td>
                      <td>
                        ".$row["status"]."
                      </td>
                      <td>
                        ".$row["folioout"]."
                      </td>
                      </tr>";
                    }
                  }
                }
              }
             ?>
          </table>
        </div>
      </div>
    </div>

  </body>
</html>
