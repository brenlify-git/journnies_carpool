<?php 

 include '../config/connection.php';
 date_default_timezone_set('Asia/Manila');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journnies | Booking</title>
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



  <style>
    .require {
      color: red;
    }
  </style>

</head>

<body>
  <!-- ======= Sidebar and Header ======= -->
  <?php include '../headerbars/headerbar-passenger.php';?>
  <?php include '../sidebars/sidebar-passenger.php';?>

  <!-- End Sidebar and Header-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard-passenger.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../reg_inserts/registered-cars.php">Registered Cars</a></li>
          <li class="breadcrumb-item active">Add Route</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-12">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Available Book <span>| As of Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 245 </h6>
                      <span class="text-success small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">VIEW</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

 

</body>

</html>