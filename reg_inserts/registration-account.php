<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Journnies | Registration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/RideShare.png" rel="icon">
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
    <link rel="stylesheet" href="../assets/css/table.css">
    <style>
        .headerhey {
            padding: 30px;
            text-align: center;
            background: rgb(2, 1, 17);
            background: linear-gradient(90deg, rgba(2, 1, 17, 1) 0%, rgba(60, 60, 69, 1) 65%);
            font-family: 'Poppins', sans-serif;
            color: white;
            font-size: 35px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>

    <!-- USERNAME -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#username').keyup(function() {
                $.post("avail-username.php", {
                    username: $('#username').val(),

                }, function(response) {
                    $('#usernameResult').fadeOut();
                    setTimeout("Userresult('usernameResult','" + escape(response) + "')", 350);
                });
                return false;
            });
        });

        function Userresult(id, response) {
            $('#usernameLoading').hide();
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    </script>

<!-- PROMO -->
<script type="text/javascript">
        $(document).ready(function() {
            $('#promo').keyup(function() {
                $.post("avail-promo.php", {
                    promo: $('#promo').val(),

                }, function(response) {
                    $('#promoResult').fadeOut();
                    setTimeout("Userresult('promoResult','" + escape(response) + "')", 350);
                });
                return false;
            });
        });

        function Userresult(id, response) {
            $('#promoLoading').hide();
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    </script>

</head>

<body>

    <div class="imgheader">
        <div class="headerhey">
            <img src="../assets/img/rideshare.png" style="width:200px">
            <br>
            Welcome, Journers!
            <h6>Register your details here.</h6>
        </div>
    </div>


    <div class="m-5">

        <?php

        if (isset($_SESSION['status'])) {
        ?>

            <div class="alert alert-warning">
                <?= $_SESSION['status']; ?>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>

        <div class="pagetitle">
            <h1>Registration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../logins/index.php">Welcome</a></li>
                    <li class="breadcrumb-item active">Sign Up</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Insert your Information</h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="register-user.php" method="post">


                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Juan" name="firstName" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" placeholder="Santos" name="middleName" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Dela Cruz" name="lastName" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" placeholder="09770191818" pattern="09[0-9]{9}" maxlength="11" name="contactNumber" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="juandelacruz@gmail.com" name="email">
                                </div>


                                <div class="col-md-3">
                                    <label for="inputAddress5" class="form-label">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Adamya" name="street" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress5" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" placeholder="Caniogan" name="barangay" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress5" class="form-label">Municipality</label>
                                    <input type="text" class="form-control" id="municipality" placeholder="Baliwag City" name="municipality" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress5" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province" placeholder="Bulacan" name="province" required>
                                </div>

                                <h5 class="card-title" style="margin-top: 6px; margin-bottom:-10px">Account Verification</h5>
                                <div class="col-md-6">
                                    <label class="col-sm-7 form-label">ID Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="idType" required id="idType" onchange="enableIdNumber()">
                                            <option value="invalid">-- Select --</option>
                                            <option value="UMID">UMID</option>
                                            <option value="Drivers License">Driver's License</option>
                                            <option value="Professional Regulation Commission (PRC) ID">Professional Regulation Commission (PRC) ID</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Social Security System">Social Security System</option>
                                            <option value="National ID">National ID</option>
                                            <option value="Pag-ibig ID">Pag-ibig ID</option>
                                            <option value="Postal ID">Postal ID</option>
                                            <option value="Phil-health ID">Phil-health ID</option>
                                            <option value="Government Issued ID">Government Issued ID</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">ID Number</label>
                                    <input type="text" class="form-control" id="idNumber" placeholder="0000-000-0000" name="idNumber" disabled required oninput="disableBtn()">
                                </div>

                                <script>
                                    function enableIdNumber() {
                                        var idType = document.getElementById("idType");
                                        var idNumber = document.getElementById("idNumber");
                                        if (idType.value != "invalid") {
                                            idNumber.disabled = false;
                                        } else {
                                            idNumber.disabled = true;
                                        }
                                    }

                                    function disableBtn() {
                                        var idNumber = document.getElementById("idNumber");
                                        var idBtn = document.getElementById("register");
                                        if (idNumber.value == "") {
                                            idBtn.disabled = true;
                                        } else {
                                            idBtn.disabled = false;
                                        }
                                    }
                                </script>

                                <!-- PROMO CODE -->
                                <h5 class="card-title" style="margin-top: 6px; margin-bottom:-10px">Referral Code</h5>


                                <div class="col-md-6">
                                    <label for="inputAddress7" class="form-label">Referral Code</label>
                                    <input type="text" class="form-control" id="promo" placeholder="A0S02" name="promo">
                                    <span id="promoLoading"></span>
                                    <span id="promoResult"></span>
                                </div>

                                <!-- LOGIN CREDENTIALS -->
                                <h5 class="card-title" style="margin-top: 6px; margin-bottom:-10px">Login Credentials</h5>


                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Juan Dela Cruz" name="username" required>
                                    <span id="usernameLoading"></span>
                                    <span id="usernameResult"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase &#013; and lowercase letter, and at least 8 or more characters" name="password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="register_btn" class="btn btn-primary" id="register" disabled>Register </button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->


                        </div>
                    </div>



                </div>


        </section>

    </div><!-- End #main -->


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