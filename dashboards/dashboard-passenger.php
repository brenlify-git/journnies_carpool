<?php

// session_start();
include '../config/connection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journnies | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo ONLY.png" rel="icon">
  <link href="assets/img/Logo ONLY.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->
  <?php include '../headerbars/headerbar-passenger.php'; ?>
  <?php include '../sidebars/sidebar-passenger.php';
  $idLoggedUser = $_SESSION['userID'];

  $sql = "SELECT * FROM user WHERE uID = '$idLoggedUser'";
  $idx = $conn->query($sql);

  ?>

  
    <!-- End Sidebar and Header-->


    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>

      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12 ">
            <div class="row">

              <h1 style="text-align:center">Welcome <b><?= $_SESSION['firstName'] ?></b> to your dashboard!</h1>

              <?php

              while ($userGuide = mysqli_fetch_assoc($idx)) :
                $money = $userGuide['uGems'];

                $formatted_money = number_format($money, 2, '.', ',');
                $formatted_money_with_currency = '₱' . $formatted_money;


              ?>
                <h3 style="text-align:center">Your total balance: <b><?= $formatted_money_with_currency ?></b> </h3>


              <?php

              endwhile;
              ?>

              <br> <br>

              <div class="col-lg-12">
                <div class="row mt-4">

                <form action="../reg_inserts/booking.php" method="POST">

                  <!-- Sales Card -->
                  <!-- Left side columns -->
                  <div class="col-lg-12 ">
                    <div class="row">
                      <br> <br>
                      <div class="col-lg-12">
                        <div class="row mt-4">

                          <?php

                          $sqlCar = "SELECT * FROM route INNER JOIN car_details ON route.carID = car_details.carID INNER JOIN user ON
                    car_details.uID = user.uID";
                          $resultCar = $conn->query($sqlCar);

                          ?>


                          <!-- Sales Card -->
                          <?php
                          $x = 1;
                          while ($row = mysqli_fetch_assoc($resultCar)) :

                            $dateTime = new DateTime($row['routeDepartureTime']);
                            $formattedDateTime = $dateTime->format("F d, Y \t g:i A");

                            // Starting Point
                            $text = $row['routeStartingPoint'];
                            $maxCharacters = 30;

                            if (strlen($text) > $maxCharacters) {
                              $shortenedText = substr($text, 0, $maxCharacters) . "...";
                            } else {
                              $shortenedText = $text;
                            }

                            //End Point
                            $text2 = $row['routeEndPoint'];
                            $maxCharacters2 = 30;

                            if (strlen($text2) > $maxCharacters2) {
                              $shortenedText2 = substr($text2, 0, $maxCharacters2) . "...";
                            } else {
                              $shortenedText2 = $text2;
                            }
                          ?>
                            <div class="col-xxl-4 col-md-12">
                              <div class="card info-card sales-card">
                                <div class="card-body">
                                  <h5 class="card-title">Book <span>| <?= $formattedDateTime ?></span></h5>
                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-ev-front-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6> <?= $row['carType'] ?> </h6>
                                      <span><b>Starting Point:</b> <?= $shortenedText ?></span>
                                      <span><b>End Point:</b> <?= $shortenedText2 ?></span><br> <br>
                                      <input type="hidden" name="user" value="<?= $row['uID'] ?>">
                                      <input type="text" name="router" value="<?= $row['routeID']?>">
                                      <span class="text-success small pt-1 fw-bold"><button type="submit" class="btn btn-primary" id="accept-button" name="accept">See More</button></span>
                                      
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div><!-- End Sales Card -->
                          <?php
                            $x++;
                          endwhile;
                          ?>
                        </div>
                      </div>
                    </div><!-- End Right side columns -->
                  </div>
                </div>
                </form>
              </div><!-- End Right side columns -->
            </div>
      </section>

    </main><!-- End #main -->
  


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>