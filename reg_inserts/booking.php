<?php 

 include '../config/connection.php';
 $routerSet = $_POST['router'];


 $sql = "SELECT * FROM route INNER JOIN car_details ON route.carID = car_details.carID WHERE routeID = '$routerSet' AND routeStatus = 'available'";
 $idx = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Journnies | Add Routes</title>
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
            <h1>Add Route Details</h1>
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

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Your route summary, kindly check that</h2>
                            <div>

                                <?php
                                    while($sele = mysqli_fetch_assoc($idx)): 
                                ?>
                                <!-- Table with stripped rows -->
                                <table class="table table-hover datatable table-bordered text-nowrap overflow-auto">

                                    <tr>
                                        <th scope="col" style="width: 250px;">Starting Point </th>
                                        <td scope="col" style="width: 400px;"><?= $sele['routeStartingPoint'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope="col" style="width: 250px;">Destination Point </th>
                                        <td scope="col" style="width: 400px;"><?= $sele['routeEndPoint'];?></td>
                                    </tr>


                                    <tr>
                                        <th scope="col" style="width: 250px;">Departure Time </th>
                                        <td scope="col" style="width: 400px;"><?= $sele['routeDepartureTime'];?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" style="width: 250px;">Arrival Time </th>
                                        <td scope="col" style="width: 400px;"><?= $sele['routeArrivalTime'];?></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" style="width: 250px;">Kilometer</th>
                                        <td scope="col" style="width: 400px;"><?= $sele['routeKilometers'];?></td>
                                    </tr>

                                </table>
                                <!-- End Table with stripped rows -->


                                <?php 
                                         endwhile; 
                                    ?>


                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="register-car_complete.php" method="post">

                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Field Office <span
                                            class="require">*</span></label>
                                    <input type="text" class="form-control" id="inputPassword5" name="fieldOffice"
                                        value="" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-7 form-label">Car Fuel Type <span
                                            class="require">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            name="carFuelType" id="department" required>
                                            <option value="Gasoline">Gasoline</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Bio-diesel">Bio-diesel</option>
                                            <option value="Ethanol">Ethanol</option>
                                            <option value="E85">E85</option>
                                            <option value="Methanol">Methanol</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="text-center" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-success col-md-3"><i
                                            class="bi bi-car-front-fill"></i>
                                        Register</button>
                                    <button type="reset" class="btn btn-primary col-md-3"><i class="bi bi-x-circle"></i>
                                        Clear</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

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



</body>

</html>