<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>side lang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="../dashboards/dashboard-passenger.php">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <?php
        
        $loggedID = $_SESSION['userID'];

        $countNotif2 = mysqli_query($conn, "SELECT uUserType AS TypeOfUser FROM user WHERE uID = '$loggedID'");
        $row_countNotif2 = mysqli_fetch_assoc($countNotif2);
        $checkID2 = $row_countNotif2["TypeOfUser"];

        $countNotif = mysqli_query($conn, "SELECT uIDType AS TypeOfID FROM user WHERE uID = '$loggedID'");
        $row_countNotif = mysqli_fetch_assoc($countNotif);
        $checkID = $row_countNotif["TypeOfID"];
            

        $countNotif3 = mysqli_query($conn, "SELECT uUserVerify_License AS verifyLN FROM user WHERE uID = '$loggedID'");
        $row_countNotif3 = mysqli_fetch_assoc($countNotif3);
        $checkID3 = $row_countNotif3["verifyLN"];
        
            if($checkID == "Drivers License" && $checkID3 == 1 && $checkID2 == "Driver"){

        ?>

             <li class="nav-item">
                <a class="nav-link collapsed" href="../reg_inserts/register-car.php">
                    <i class="bi bi-people"></i>
                    <span>Car Registration</span>
                </a>
            </li>

            

            <li class="nav-item">
                <a class="nav-link collapsed" href="../reg_inserts/registered-cars.php">
                    <i class="bi bi-car-front-fill"></i>
          
                    <span>Registered Cars</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../trans_model/cashout.php">
                <i class="bi bi-cash-coin"></i>
          
                    <span>Cash Out Funds</span>
                </a>
            </li>
            

            <?php
                }

               

                    ?>


            <li class="nav-item">
                <a class="nav-link collapsed" href="../trans_model/cashin.php">
                <i class="bi bi-cash"></i>
          
                    <span>Cash In Funds</span>
                </a>
            </li>

         



            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="../reg_inserts/registered-cars.php">
                    <i class="bi bi-people"></i>
                    <span>Registered Cars</span>
                </a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="../config/userprofile-passenger.php">
                    <i class="bi bi-people"></i>
                    <span>User Account</span>
                </a>
            </li><!-- End Dashboard Nav -->
           

            <li class="nav-item">
                <a class="nav-link collapsed" href="../config/logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log out</span>
                </a>
            </li><!-- End Error 404 Page Nav -->
        </ul>
    </aside>

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