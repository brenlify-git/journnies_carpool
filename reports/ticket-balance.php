<?php 

include '../config/connection.php';


$sql = "SELECT * FROM user WHERE uUserVerify_Reg = 1 AND uUserType != 'Admin' ";
$id = $conn->query($sql);

$countAmount = mysqli_query($conn, "SELECT SUM(uGems) AS totalAmount FROM user WHERE uUserVerify_Reg = 1 AND uUserType != 'Admin' ");
$row_countAmount = mysqli_fetch_assoc($countAmount);
$totalAmountCount = $row_countAmount["totalAmount"];


$formatted_money = number_format($totalAmountCount, 2, '.', ',');
$amountTot = '₱' . $formatted_money;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>InFuse | Patron Masterlist</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

</head>

<body>

    <!-- ======= Sidebar and Header ======= -->

    <?php include '../headerbars/headerbar.php';?>
    <?php include '../sidebars/sidebar.php';?>

    <!-- End Sidebar and Header-->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User's Balance</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboards/dashboard.php">Home</a></li>
                    <li class="breadcrumb-item">Report Generation</li>
                    <li class="breadcrumb-item active">User's Balance</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

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
                        <h2 class="card-title">This table displays the records of available user's balance</h2>

                        <div style="max-height: 400px; overflow: auto;">
                            <!-- Table with stripped rows -->
                            <table class="table table-hover datatable table-bordered text-nowrap text-center">
                                <thead class="table-secondary" style="position: sticky; top: 1;">
                                    <tr>
                                        <th scope="col" style="width: 250px;">User ID</th>
                                        <th scope="col" style="width: 400px;">Name</th>
                                        <th scope="col" style="width: 250px;">Account Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($tbl_bookinfo = mysqli_fetch_assoc($id)):
                                    ?>
                                        <tr>
                                            <td><?= $tbl_bookinfo['uID']; ?></td>
                                            <th><?= $tbl_bookinfo['uFirstName'] . " " . $tbl_bookinfo['uLastName']; ?></th>
                                            <td><?= $tbl_bookinfo['uGems']; ?></td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>

                        <!-- Display the totals in a separate row (outside the scrollable div) -->
                        <table class="table table-bordered text-center" >
                            <tbody>
                                <tr>
                                    <td style="text-align:right; padding-right: 20px; width: 628px;"><b>Total</b></td>
                                    <th style="width: 250px;"><?= $amountTot; ?></th>
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

</body>

</html>