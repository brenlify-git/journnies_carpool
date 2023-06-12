<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Journnies | Registered Cars</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include_once '../headerbars/headerbar-passenger.php'; ?>
  <?php include '../sidebars/sidebar-passenger.php'; ?>

  <!-- End Sidebar and Header-->

  <?php
  $idset = $_SESSION['userID'];

  $sql = "SELECT * FROM car_details INNER JOIN route ON car_details.carID = route.carID WHERE uID = '$idset' AND car_verify=1";
  $id = $conn->query($sql);



  ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Cars</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard-passenger.php">Home</a></li>
          <li class="breadcrumb-item active">Registered Cars</li>
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
                      <th scope="col">Route</th>
                      <th scope="col">Action</th>
                      <th scope="col">Seat</th>
                      <th scope="col">Car ID</th>
                      <th scope="col">Car Color</th>
                      <th scope="col">Car Model</th>
                      <th scope="col">Car Type</th>
                      <th scope="col">Manufacturer</th>
                      <th scope="col">Year Manufactured</th>
                      <th scope="col">Category</th>
                      <th scope="col">Fuel Type</th>
                      <th scope="col">Plate Number</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    while ($tbl_patrons = mysqli_fetch_assoc($id)) :
                      $idUsedforCar = $tbl_patrons['carID'];

                      $countSeatReg = mysqli_query($conn, "SELECT COUNT(*) AS countRegistered FROM car_seat WHERE carID = '$idUsedforCar' ");
                      $row_countSeatReg = mysqli_fetch_assoc($countSeatReg);
                      $countSeatRegistered = $row_countSeatReg["countRegistered"];
                    ?>
                      <form action="add-route.php" method="post" enctype="multipart/form-data">

                        <tr class="text-center">


                          <input type="hidden" name="carID" value="<?= $tbl_patrons['carID']; ?>">
                          <input type="hidden" name="plateNumber" value="<?= $tbl_patrons['carPlateNumber']; ?>">

                          <?php
                          if ($countSeatRegistered == 0) {
                            echo '<td><span class="badge text-bg-danger">Seat Required</span></td>';
                            echo '<td><button type="submit" disabled class="btn btn-primary" title="You need to register a car seat first."><i class="bi bi-ev-front"></i></button>';
                          } else {
                            echo '<td><span class="badge text-bg-success">Able to Create</span></td>';
                            echo '<td><button type="submit" class="btn btn-primary" title="Create Route"><i class="bi bi-ev-front"></i></button>';
                          }
                          ?>

                          <a href="add-seats.php?id=<?= $tbl_patrons['carID']; ?>" class="btn btn-warning" title="Register Car Seat"><i class="bi bi-ev-front"></i></a>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-x-circle"></i>
                          </button>

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
                                  <a href="cancelroute.php?id=<?= $tbl_patrons['carID']; ?>" class="btn btn-primary" title="Cancel Route">Yes</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          </td>

                          <td><?= $countSeatRegistered ?></td>
                          <td><?= $tbl_patrons['carID']; ?></td>
                          <td><?= $tbl_patrons['carColor']; ?></td>
                          <td><?= $tbl_patrons['carModel']; ?></td>
                          <td><?= $tbl_patrons['carType']; ?></td>
                          <td><?= $tbl_patrons['carManufacturer']; ?></td>
                          <td><?= $tbl_patrons['carYearManufactured']; ?></td>
                          <td><?= $tbl_patrons['carCategory']; ?></td>
                          <td><?= $tbl_patrons['carFuelType']; ?></td>
                          <td><?= $tbl_patrons['carPlateNumber']; ?></td>


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