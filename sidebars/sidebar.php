<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>side lang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">


  
</head>

<body>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="../dashboards/dashboard.php">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/wrvsvaoj.json" trigger="hover" style="height:20px">
                    </lord-icon> <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->



            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#SET-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Application & Approval</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="SET-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../create_membership/membership.php">
                            <i class="bi bi-people" style="font-size: 15px;"></i>
                            <span>Driver's Application</span>
                        </a>
                    </li>
                    <li>
                        <a href="../create_membership/id-approval.php">
                            <i class="bi bi-person-vcard" style="font-size: 15px;"></i>
                            <span>ID Approval</span>
                        </a>
                    </li>

                    <li>
                        <a href="../process/approve-cashin.php">
                            <i class="bi bi-wallet2" style="font-size: 15px;"></i>
                            <span>Wallet Approval</span>
                        </a>
                    </li>

                    <li>
                        <a href="admin-membership.php">
                            <i class="bi bi-person-add" style="font-size: 15px;"></i>
                            <span>Admin's Application</span>
                        </a>
                    </li>   

                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                   <i class="bi bi-bar-chart-steps"></i><span>Report Generation</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../reports/cashin-transaction.php">
                            <i class="bi bi-cash-coin" style="font-size: 15px;"></i>
                            <span>Cash In Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="../reports/cashout-transaction.php">
                            <i class="bi bi-cash-stack" style="font-size: 15px;"></i>
                            <span>Cash Out Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="../reports/ticket-balance.php">
                            <i class="bi bi-cash-stack" style="font-size: 15px;"></i>
                            <span>User's Balance</span>
                        </a>
                    </li>

                    

                </ul>
            </li><!-- End Tables Nav -->



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
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>