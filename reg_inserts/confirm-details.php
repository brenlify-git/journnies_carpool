<?php 

 include '../config/connection.php';

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
                            <form action="../process/routes-process.php" method="post" enctype="multipart/form-data">
                                <h2 class="card-title">Your route summary, kindly check that</h2>
                                <div>
                                    <!-- Table with stripped rows -->
                                    <table class="table table-hover datatable table-bordered text-nowrap">
                                        <tr>
                                            <th scope="col" style="width: 250px;">Car ID</th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['carID'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="width: 250px;">Starting Point </th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['startingPoint'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="width: 250px;">Destination Point </th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['destinationPoint'];?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="width: 250px;">Date</th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['dateSet'];?></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" style="width: 250px;">Departure Time </th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['departureTime'];?></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" style="width: 250px;">Arrival Time </th>
                                            <td scope="col" style="width: 400px;"><?= $_POST['arrivalTime'];?></td>
                                        </tr>

                                        
                                        <input type="hidden" name="carID" value="<?= $_POST['carID'];?>">
                                        <input type="hidden" name="startPoint" value="<?= $_POST['startingPoint'];?>">
                                        <input type="hidden" name="endPoint" value="<?= $_POST['destinationPoint'];?>">
                                        <input type="hidden" name="dateSet" value="<?= $_POST['dateSet'];?>">
                                        <input type="hidden" name="deptTime" value="<?= $_POST['departureTime'];?>">
                                        <input type="hidden" name="arriveTime" value="<?= $_POST['arrivalTime'];?>">
                                        

                                        <?php

                                        function getDistance($addressFrom, $addressTo, $unit = ''){
                                            // Google API key
                                            $apiKey = 'AIzaSyDlLD_QkZd5kw0AqsMygwrxQyxsipt1isY';
                                            
                                            // Change address format
                                            $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
                                            $formattedAddrTo     = str_replace(' ', '+', $addressTo);
                                            
                                            // Geocoding API request with start address
                                            $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
                                            $outputFrom = json_decode($geocodeFrom);
                                            if(!empty($outputFrom->error_message)){
                                                return $outputFrom->error_message;
                                            }
                                            
                                            // Geocoding API request with end address
                                            $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
                                            $outputTo = json_decode($geocodeTo);
                                            if(!empty($outputTo->error_message)){
                                                return $outputTo->error_message;
                                            }
                                            
                                            // Get latitude and longitude from the geodata
                                            $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
                                            $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
                                            $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
                                            $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
                                            
                                            // Calculate distance between latitude and longitude
                                            $theta    = $longitudeFrom - $longitudeTo;
                                            $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
                                            $dist    = acos($dist);
                                            $dist    = rad2deg($dist);
                                            $miles    = $dist * 60 * 1.1515;
                                            
                                            // Convert unit and return distance
                                            $unit = strtoupper($unit);
                                            if($unit == "K"){
                                                return round($miles * 1.609344, 2).' km';
                                            }elseif($unit == "M"){
                                                return round($miles * 1609.344, 2).' meters';
                                            }else{
                                                return round($miles, 2).' miles';
                                            }
                                        }

                                        $addressFrom = $_POST['startingPoint'];
                                        $addressTo = $_POST['destinationPoint'];
                                        $distance = getDistance($addressFrom, $addressTo, "K");
                                        $kiloValue = $_SESSION['kilometerCalc'] = $distance;
                                    ?>

                                    </table>
                                    <!-- End Table with stripped rows -->

                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Kilometer</label>
                                        <input type="text" style="height: 60px; font-size:40px"
                                            class="form-control text-center bg-success text-light" id="deptTime"
                                            name="kilometer" value="<?= $kiloValue ?>" required>
                                    </div>

                                    <div class="text-center" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-success col-md-3"><i class="bi bi-car-front-fill"></i>
                                        Request for Approval
                                    </button>
                                </div>

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



</body>

</html>