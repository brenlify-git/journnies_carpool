<?php 


include '../config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rideshare | Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <!-- ======= Sidebar and Header ======= -->
  <?php include '../headerbars/headerbar.php';?>
  <?php include '../sidebars/sidebar.php';
  

  ?>


  <!-- End Sidebar and Header-->

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
       <div class="col-lg-12">
          <div class="row">

         <h1 style="text-align:center">Welcome <b><?= $_SESSION['firstName'] ?></b>  to your dashboard!</h1> 

        </div><!-- End Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

 

  <!-- Template Main JS File -->


</body>

</html>