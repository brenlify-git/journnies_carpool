<?php 
// session_start();
include '../config/connection.php';


$sql = "SELECT * FROM user INNER JOIN car_details ON car_details.uID = user.uID WHERE uUserType = 'Driver' AND car_verify= 0";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RideSharer | Membership</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <style>
    button {
      --width: 200px;
      --timing: 2s;
      border: 0;
      width: var(--width);
      padding-block: 1em;
      color: #fff;
      font-weight: bold;
      font-size: 1em;
      background: rgb(0, 116, 189);
      transition: all 0.2s;
      border-radius: 3px;
      margin: 20px;
    }

    .require {
      color: red;
    }
  </style>

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include '../headerbars/headerbar.php';?>
  <?php include '../sidebars/sidebar.php';?>

  <!-- End Sidebar and Header-->

 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Membership</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Membership</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



<?php

if(($_SESSION['CarRegistrationStatus']) != ''){
?>

<div class="alert alert-warning text-center">
   <b><i class="bi bi-exclamation-diamond-fill"></i> <?= $_SESSION['CarRegistrationStatus']; ?></b> 
</div>
<?php
}

$_SESSION['CarRegistrationStatus'] = '';

?>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Registration's Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3" action="../reg_inserts/car-registration.php" method="post">

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">User ID</label>
                  <input type="text" class="form-control"id="regID" name="userID" required>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Registration ID</label>
                  <input type="number" class="form-control" id="carID" name="carID" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Juan" name="firstName" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middleName" placeholder="Santos" name="middleName"
                    required>
                </div>
                
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Dela Cruz" name="lastName"
                    required>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" id="contactNumber" placeholder="09770191818"
                    pattern="09[0-9]{9}" maxlength="11" name="contactNumber" required>
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
                  <input type="text" class="form-control" id="municipality" placeholder="Baliwag City"
                    name="municipality" required>
                </div>
                <div class="col-md-3">
                  <label for="inputAddress5" class="form-label">Province</label>
                  <input type="text" class="form-control" id="province" placeholder="Bulacan" name="province" required>
                </div>

                <h5 class="card-title" style="margin-top: 6px; margin-bottom:-10px">Account Verification</h5>
                <div class="col-md-6">
                  <label class="col-sm-7 form-label">ID Type</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" onchange="enableIdNumber()"
                      name="idType" required id="idType">
                      <option value="invalid">-- Select --</option>
                      <option value="UMID">UMID</option>
                      <option value="Drivers License">Driver's License</option>
                      <option value="Professional Regulation Commission (PRC) ID">Professional Regulation Commission
                        (PRC) ID</option>
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
                  <input type="text" class="form-control" id="idNumber" placeholder="0000-000-0000" name="idNumber"
                    disabled required>
                </div>

                <h5 class="card-title" style="margin-top: 6px; margin-bottom:-10px"> Car Details</h5>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Car Color <span class="require">*</span></label>
                  <input type="text" class="form-control" id="carColor" name="carColor" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Car Model <span class="require">*</span></label>
                  <input type="text" class="form-control" id="carModel" name="carModel" value="" required>
                </div>


                <div class="col-md-4">
                  <label class="col-sm-7 form-label">Car Type <span class="require">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="carType" id="carType"
                      required>
                      <option value="SUV">SUV</option>
                      <option value="Coupe">Coupe</option>
                      <option value="Crossover">Crossover</option>
                      <option value="Compact">Compact</option>
                      <option value="Pickup Truck">Pickup Truck</option>
                      <option value="Grand Tourer">Grand Tourer</option>
                      <option value="Hatchback">Hatchback</option>
                      <option value="Station Wagon">Station Wagon</option>
                      <option value="Minivan">Minivan</option>
                      <option value="Van">Van</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label"> Car Manufacturer <span
                      class="require">*</span></label>
                  <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label"> Car Engine No <span class="require">*</span></label>
                  <input type="text" class="form-control" id="engineNo" name="engineNo" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label"> Car Chasis No <span class="require">*</span></label>
                  <input type="text" class="form-control" id="chasisNo" name="chasisNo" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Year Manufactured <span
                      class="require">*</span></label>
                  <input type="date" class="form-control" id="yearManufactured" name="yearManufactured"
                    value="<?php echo isset($_POST['yearManufactured']) ? $_POST['yearManufactured'] : ''; ?>" required>
                </div>


                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label"> Car Category <span class="require">*</span></label>
                  <input type="text" class="form-control" id="category" name="carCategory" value="" required>
                </div>

                <div class="col-md-4">
                  <label class="col-sm-7 form-label">Fuel Type <span class="require">*</span></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="fuelType" id="fuelType"
                      required>
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

                <!-- <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Seat Capacity <span class="require">*</span></label>
                  <input type="number" class="form-control" id="seatCapacity" min="1" max="16" name="seatCapacity"
                    value="" required>
                </div> -->

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Plate Number <span class="require">*</span></label>
                  <input type="text" class="form-control" id="plateNumber" name="plateNumber" value="" required>
                </div>


                <div class="text-center buttonsResponse">
                  <button type="submit" class="btn btn-primary" id="accept-button" name="accept">+ Accept
                    Registration</button>
                  <button type="submit" class="btn btn-success" name="decline">- Decline Registration</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card">
            <div class="card-body">

              <h2 class="card-title ">Driver's Membership Request | <span>Subject to approval</span></h2>


              <form name="excel.php" method="post">

                <div class="overflow-auto mt-4">

                  <!-- Table with stripped rows -->
                  <table class="table table-hover table-bordered text-nowrap text-center"
                    style="max-height: 695px; overflow: auto; display: inline-block;" id="table">
                    <thead class="table-dark" style="position:sticky; top: 0 ;">
                      <tr>

                        <th scope="col">User ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">ID Type</th>
                        <th scope="col">ID Number</th>
                        <th scope="col">Car Color</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Car Type</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Engine Number</th>
                        <th scope="col">Chasis Number</th>
                        <th scope="col">Year Manufactured</th>
                        <th scope="col">Category</th>
                        <th scope="col">Fuel Type</th>
                  
                        <th scope="col">Plate Number</th>
                        <th scope="col">Street</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">Municipality</th>
                        <th scope="col">Province</th>
                        <th scope="col">Car ID</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                  while($tbl_patrons = mysqli_fetch_assoc($id)):   

                    
                ?>
                      <tr>

                        <td><?= $tbl_patrons['carID'];?></td>
                        <td><?= $tbl_patrons['uFirstName'];?></td>
                        <td><?= $tbl_patrons['uMiddleName'];?></td>
                        <td><?= $tbl_patrons['uLastName'];?></td>
                        <td><?= $tbl_patrons['uContact'];?></td>
                        <td><?= $tbl_patrons['uEmail'];?></td>
                        <td><?= $tbl_patrons['uIDType'];?></td>
                        <td><?= $tbl_patrons['uIDNumber'];?></td>
                        <td><?= $tbl_patrons['carColor'];?></td>
                        <td><?= $tbl_patrons['carModel'];?></td>
                        <td><?= $tbl_patrons['carType'];?></td>
                        <td><?= $tbl_patrons['carManufacturer'];?></td>
                        <td><?= $tbl_patrons['carEngineNo'];?></td>
                        <td><?= $tbl_patrons['carChasis'];?></td>
                        <td><?= $tbl_patrons['carYearManufactured'];?></td>
                        <td><?= $tbl_patrons['carCategory'];?></td>
                        <td><?= $tbl_patrons['carFuelType'];?></td>
                   
                        <td><?= $tbl_patrons['carPlateNumber'];?></td>
                        <td><?= $tbl_patrons['uStreet'];?>
                        <td><?= $tbl_patrons['uBaranagy'];?></td>
                        <td><?= $tbl_patrons['uCity'];?></td>
                        <td><?= $tbl_patrons['uProvince'];?> </td>
                        <td><?= $tbl_patrons['uID'];?> </td>
                        </td>

                      </tr>



                      <?php
          endwhile;
          ?>

                    </tbody>
                  </table>


              </form>
            </div>
    </section>

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

 

  <script>
    var table = document.getElementById('table');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("regID").value = this.cells[22].innerHTML;
        document.getElementById("firstName").value = this.cells[1].innerHTML;
        document.getElementById("middleName").value = this.cells[2].innerHTML;
        document.getElementById("lastName").value = this.cells[3].innerHTML;
        document.getElementById("contactNumber").value = this.cells[4].innerHTML;
        document.getElementById("email").value = this.cells[5].innerHTML;
        document.getElementById("idType").value = this.cells[6].innerHTML;
        document.getElementById("idNumber").value = this.cells[7].innerHTML;
        document.getElementById("carColor").value = this.cells[8].innerHTML;
        document.getElementById("carModel").value = this.cells[9].innerHTML;
        document.getElementById("carType").value = this.cells[10].innerHTML;
        document.getElementById("manufacturer").value = this.cells[11].innerHTML;
        document.getElementById("engineNo").value = this.cells[12].innerHTML;
        document.getElementById("chasisNo").value = this.cells[13].innerHTML;
        document.getElementById("yearManufactured").value = this.cells[14].innerHTML;
        document.getElementById("category").value = this.cells[15].innerHTML;
        document.getElementById("fuelType").value = this.cells[16].innerHTML;
        document.getElementById("plateNumber").value = this.cells[17].innerHTML;
        document.getElementById("street").value = this.cells[18].innerHTML;
        document.getElementById("barangay").value = this.cells[19].innerHTML;
        document.getElementById("municipality").value = this.cells[20].innerHTML;
        document.getElementById("province").value = this.cells[21].innerHTML;
        document.getElementById("carID").value = this.cells[0].innerHTML;

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>