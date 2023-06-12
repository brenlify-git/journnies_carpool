  

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

  <?php include_once '../headerbars/headerbar-passenger.php';?>
  <?php include '../sidebars/sidebar-passenger.php'; ?>

  <!-- End Sidebar and Header-->

  <?php
$idset = $_SESSION['userID'];

$sql = "SELECT * FROM car_details WHERE uID = '$idset' AND car_verify=1";
$id = $conn->query($sql);

  ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Cars</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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
                    <div class="overflow-auto mt-4">
                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
                      <thead class="table-secondary" style="position:sticky; top: 0 ;">
                        <tr>
                          <th scope="col">Car ID</th>
                          <th scope="col">Car Color</th>
                          <th scope="col">Car Model</th>
                          <th scope="col">Car Type</th>
                          <th scope="col">Manufacturer</th>
                          <th scope="col">Year Manufactured</th>
                          <th scope="col">Category</th>
                          <th scope="col">Fuel Type</th>
                          <th scope="col">Plate Number</th>
                          <th scope="col">Route</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        while($tbl_patrons = mysqli_fetch_assoc($id)):   
                      ?>
                      <form action="add-route.php" method="post" enctype="multipart/form-data">

                        <tr class="text-center">
                      
                        
                        <input type="hidden" name="carID" value="<?=$tbl_patrons['carID'];?>">
                        <input type="hidden" name="plateNumber" value="<?=$tbl_patrons['carPlateNumber'];?>">

                        <td><?= $tbl_patrons['carID'];?></td>
                        <td><?= $tbl_patrons['carColor'];?></td>
                        <td><?= $tbl_patrons['carModel'];?></td>
                        <td><?= $tbl_patrons['carType'];?></td>
                        <td><?= $tbl_patrons['carManufacturer'];?></td>
                        <td><?= $tbl_patrons['carYearManufactured'];?></td>
                        <td><?= $tbl_patrons['carCategory'];?></td>
                        <td><?= $tbl_patrons['carFuelType'];?></td>
                        <td><?= $tbl_patrons['carPlateNumber'];?></td>
                        <td><button class="btn btn-primary" type="submit" title="Create Route"><i class="bi bi-ev-front"></i></button></td>
                        <td><span class="badge text-bg-success">Accepted</span></td>
                        
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