<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Journnies | Terms and Condition</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Bootstrap CSS Integration -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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

</head>

<body>

    <form action="../config/verify-email.php" method="POST">
        <div class="container">
            <h1>Terms and Condition</h1>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            User Account, Privacy, and Data Protection
                            <input type="hidden" value="<?= $_GET['user'] ?>" name="user">
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>1.1</strong> By using the Journnies Carpooling Application, you agree to provide accurate, current, and complete information during the registration process. It is essential to provide truthful details such as your name, contact information, and any other required information to create and maintain your user account.<br>
                            <strong>1.2</strong> As a user, you are responsible for maintaining the confidentiality of your account credentials, including your username and password. You are fully responsible for all activities that occur under your account. It is essential to keep your login credentials secure and not share them with anyone else. If you suspect any unauthorized use of your account, you must immediately notify Journnies Carpooling Application.<br>
                            <strong>1.3</strong> Journnies Carpooling Application values your privacy and is committed to protecting your personal data. The application will collect, store, and process your personal information in accordance with applicable privacy laws and regulations. By using the application, you consent to the collection, storage, and processing of your personal data as described in the Privacy Policy.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Journnies Services
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>2.1</strong> The Journnies Carpooling Application provides a platform to facilitate carpooling services, connecting users who offer rides with those seeking rides. However, the application does not guarantee the availability, suitability, or safety of any users or vehicles. Users are solely responsible for evaluating and assessing the suitability, reliability, and safety of any ride offers or requests. <br>
                            <strong>2.2</strong> Journnies Carpooling Application does not endorse or take responsibility for any malicious intent, fraudulent activities, or misconduct by users. It is the users' responsibility to exercise caution and use their best judgment when interacting with other users. If you encounter any suspicious or harmful activities, it is advised to report them to the application for further investigation.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            User Responsibilities
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>3.1</strong> By using the Journnies Carpooling Application, users agree to comply with the Terms and Conditions set forth by the application. It is essential to read and understand these terms before using the platform.<br>
                            <strong>3.2</strong> Users agree not to engage in any fraudulent, misleading, harmful, or illegal activities while using the Journnies Carpooling Application. This includes but is not limited to misrepresenting information, posting false ride offers or requests, harassing or harming other users, or violating any applicable laws or regulations.
                        </div>
                    </div>
                </div>
                <br>
                These Terms and Conditions govern your use of the Journnies Carpooling Application. By accessing or using the application, you agree to be bound by these terms. It is important to review the Terms and Conditions periodically, as they may be updated or modified by the application at any time. If you do not agree to these terms, you should not use the Journnies Carpooling Application.
                <br>
                <!-- Button -->
                <div class="text-center buttonsResponse">
                    <button type="submit" class="btn btn-primary" id="accept-button" name="accept">Accept</button>
                    <button type="submit" class="btn btn-success" name="decline">Decline</button>
                </div>
            </div>
        </div>
    </form>



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

    <!-- JS Bootstrap Integration -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>