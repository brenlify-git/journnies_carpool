<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Journnies | Registered Routes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



</head>

<body>

    <!-- ======= Sidebar and Header ======= -->

    <?php include_once '../headerbars/headerbar-passenger.php'; ?>
    <?php include '../sidebars/sidebar-passenger.php'; ?>

    <!-- End Sidebar and Header-->

    <?php
    //ROUTING DATE
    $sqlRoute = "SELECT * FROM route";
    $routing = $conn->query($sqlRoute);
    $row = $routing->fetch_assoc();

    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i');

    //UPDATE ROUTE STATUS
    $sqlUpdate = "UPDATE route SET routeStatus = 'cancelled' WHERE routeArrivalTime = '$currentDateTime'";
    $result4 = mysqli_query($conn, $sqlUpdate);


    $idset = $_SESSION['userID'];

    $sql = "SELECT * FROM car_details INNER JOIN route ON car_details.carID = route.carID WHERE uID = '$idset' AND car_verify=1 AND routeStatus='available' ORDER BY routeID ASC";
    $id = $conn->query($sql);


    ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Registered Routes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboards/dashboard-passenger.php">Home</a></li>
                    <li class="breadcrumb-item active">Registered Routes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <!-- table starts here -->

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title ">Sorted according to the cars that are accepted by the admins</h2>
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
                            <div class="overflow-auto mt-4">
                                <!-- Table with stripped rows -->
                                <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 600px;">
                                    <thead class="table-secondary" style="position:sticky; top: 0 ;">
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th scope="col">Starting Point</th>
                                            <th scope="col">End Point</th>
                                            <th scope="col">Departure Time</th>
                                            <th scope="col">Arrival Time</th>
                                            <th scope="col">Kilometer</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($tbl_patrons = mysqli_fetch_assoc($id)) :
                                            $idUsedforCar = $tbl_patrons['carID'];


                                            $dateTime2 = new DateTime($tbl_patrons['routeDepartureTime']);
                                            $formattedDateTime2 = $dateTime2->format("F d, Y \t g:i A");

                                            $dateTime = new DateTime($tbl_patrons['routeArrivalTime']);
                                            $formattedDateTime = $dateTime->format("F d, Y \t g:i A");

                                            // Starting Point
                                            $text = $tbl_patrons['routeStartingPoint'];
                                            $maxCharacters = 20;

                                            if (strlen($text) > $maxCharacters) {
                                                $shortenedText = substr($text, 0, $maxCharacters) . "...";
                                            } else {
                                                $shortenedText = $text;
                                            }

                                            //End Point
                                            $text2 = $tbl_patrons['routeEndPoint'];
                                            $maxCharacters2 = 20;

                                            if (strlen($text2) > $maxCharacters2) {
                                                $shortenedText2 = substr($text2, 0, $maxCharacters2) . "...";
                                            } else {
                                                $shortenedText2 = $text2;
                                            }
                                        ?>
                                            <form method="post" enctype="multipart/form-data">

                                                <tr class="text-center">


                                                    <input type="hidden" name="carID" value="<?= $tbl_patrons['carID']; ?>">
                                                    <input type="hidden" name="plateNumber" value="<?= $tbl_patrons['carPlateNumber']; ?>">

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Cancel Confirmation</b></h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Are you sure you want to Cancel?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                    <a href="cancelroute.php?id=<?= $tbl_patrons['routeID']; ?>" class="btn btn-primary" title="Cancel Route">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </td>

                                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-x-circle"></i></button></td>
                                                    <td><?= $shortenedText ?></td>
                                                    <td><?= $shortenedText2  ?></td>
                                                    <td><?= $formattedDateTime2  ?></td>
                                                    <td><?= $formattedDateTime ?></td>
                                                    <td><?= $tbl_patrons['routeKilometers'] . " " . $currentDateTime; ?></td>



                                                </tr>
                                            </form>

                                        <?php
                                        endwhile;
                                        ?>

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->


                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



</body>

</html>