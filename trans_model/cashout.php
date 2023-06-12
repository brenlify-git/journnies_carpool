<?php 

// session_start();
include '../config/connection.php';

// $usersID =  $_SESSION['userID'];
// $stat = "SELECT car_driver.verifyStatus AS driverStat FROM `car_driver` INNER JOIN user ON user.userID = car_driver.userID WHERE car_driver.userID = $usersID";
// $checkStat = $conn->query($stat);


// $countStudents = mysqli_query($conn, "SELECT car_driver.licenseNumber AS LicenseNumber FROM car_driver INNER JOIN user ON user.userID = car_driver.userID WHERE car_driver.userID = $usersID");
// $row_countStud = mysqli_fetch_assoc($countStudents);
// $countStud = $row_countStud["LicenseNumber"];



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journnies | Cash Out</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/table.css">

  <style>
    .require {
      color: red;
    }
  </style>

</head>

<body>
  <!-- ======= Sidebar and Header ======= -->
  <?php include '../headerbars/headerbar-passenger.php';?>
  <?php include '../sidebars/sidebar-passenger.php';
  $usersID =  $_SESSION['userID'];
  $sql = "SELECT *
        FROM cashin_cashout
        INNER JOIN user ON cashin_cashout.uID = user.uID
        WHERE transType = 'Cash Out'
          AND user.uID = $usersID AND transConfirmStatus = 1";

  $id = $conn->query($sql);

  $countAmount = mysqli_query($conn, "SELECT SUM(transAmount) AS totalAmount FROM cashin_cashout
        INNER JOIN user ON cashin_cashout.uID = user.uID
        WHERE transType = 'Cash Out'
          AND cashin_cashout.transConfirmStatus = 1");
  $row_countAmount = mysqli_fetch_assoc($countAmount);
  $totalAmountCount = $row_countAmount["totalAmount"];

  $formatted_money = number_format($totalAmountCount, 2, '.', ',');
  $amountTot = '₱' . $formatted_money;
  ?>

  <!-- End Sidebar and Header-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Top-Up your Funds here.</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard-passenger.php">Home</a></li>
          <li class="breadcrumb-item active">Top Up</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
              <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
          </svg>



          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cash Out Details</h5>

              <?php 
                  if(($_SESSION['messageResult']) != ""){?>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['messageResult']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <?php
                  $_SESSION['messageResult'] = "";
                  }
              ?>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="../process/cashout-process.php" method="post">

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">GCash Number <span
                      class="require">*</span></label>
                  <input type="text" class="form-control" maxlength="11" id="inputPassword5" name="gcashNo" value="" autocomplete="off" required>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Amount to Withdraw <span class="require">*</span></label>
                  <input type="number" class="form-control" id="inputPassword5" name="amount" value="" min="1" required>
                  <small>Please enter a valid number.</small>
                </div>
              
                <div class="text-center" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-success col-md-3"><i class="bi bi-cash-coin"></i>
                    Request for Approval</button>
                  <button type="reset" class="btn btn-primary col-md-3"><i class="bi bi-x-circle"></i>
                    Clear</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>


      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <!-- table starts here -->

          <div class="card">
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">

                <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
                  <i class="bi bi-file-earmark-spreadsheet"></i>
                  Export
                </button>
                <h2 class="card-title">This table displays the history of your cash out transaction</h2>

                <div style="max-height: 400px; overflow: auto;">
                  <!-- Table with stripped rows -->
                  <table class="table table-hover datatable table-bordered text-nowrap text-center">
                    <thead class="table-secondary" style="position: sticky; top: 1;">
                      <tr>
                        <th scope="col" style="width: 250px;">No.</th>
                        <th scope="col" style="width: 400px;">Name</th>
                        <th scope="col" style="width: 250px;">Amount</th>
                        <th scope="col" style="width: 250px;">Processing Fee</th>
                        <th scope="col" style="width: 250px;">Gems Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $x = 1;
                      while ($tbl_bookinfo = mysqli_fetch_assoc($id)) :
                      ?>
                        <tr>
                          <td><?= $x ?></td>
                          <th><?= $tbl_bookinfo['uFirstName'] . " " . $tbl_bookinfo['uLastName']; ?></th>
                          <td><?= $tbl_bookinfo['transAmount']; ?></td>
                          <td><?= $tbl_bookinfo['transProFee']; ?></td>
                          <td><?= $tbl_bookinfo['transAmount'] + $tbl_bookinfo['transProFee']; ?> </td>
                        </tr>
                      <?php
                        $x++;
                      endwhile;
                      ?>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>

                <!-- Display the totals in a separate row (outside the scrollable div) -->
                <table class="table table-bordered text-center">
                  <tbody>
                    <tr>
                      <td style="text-align:right; padding-right: 20px; width: 628px;"><b>Total Cash In Amount</b></td>
                      <th style="width: 136px;"><?= $amountTot; ?></th>
                    </tr>
                  </tbody>
                </table>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/toaster.js"></script>
  <script>
    function success_toast() {
      toastr.success("Fields Reset!")
    }
  </script>

</body>

</html>