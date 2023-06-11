<?php 
// session_start();
include '../config/connection.php';


$sql = "SELECT * FROM user WHERE uUserVerify_License = 0 OR uUserVerify_License = 4";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journnies | ID Verification</title>
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
      <h1>ID Approval</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">ID Approval</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



<?php

if(($_SESSION['idApprovalStatus']) != ''){
?>

<div class="alert alert-warning text-center">
   <b><i class="bi bi-exclamation-diamond-fill"></i> <?= $_SESSION['idApprovalStatus']; ?></b> 
</div>
<?php
}

$_SESSION['idApprovalStatus'] = '';

?>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Registration's Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3" action="../reg_inserts/id-approvisation.php" method="post">

                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">User ID</label>
                  <input type="text" class="form-control"id="userID" name="userID" required>
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
                     required>
                </div>


                <div class="text-center buttonsResponse">
                  <button type="submit" class="btn btn-primary" id="accept-button" name="accept">+ Accept
                    ID Request</button>
                  <button type="submit" class="btn btn-success" name="decline">- Decline ID Request</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card">
            <div class="card-body">

              <h2 class="card-title ">Valid ID Checking | <span>Subject to approval</span></h2>


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

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                  while($tbl_patrons = mysqli_fetch_assoc($id)):   

                    
                ?>
                      <tr>

                        <td><?= $tbl_patrons['uID'];?></td>
                        <td><?= $tbl_patrons['uFirstName'];?></td>
                        <td><?= $tbl_patrons['uMiddleName'];?></td>
                        <td><?= $tbl_patrons['uLastName'];?></td>
                        <td><?= $tbl_patrons['uContact'];?></td>
                        <td><?= $tbl_patrons['uEmail'];?></td>
                        <td><?= $tbl_patrons['uIDType'];?></td>
                        <td><?= $tbl_patrons['uIDNumber'];?></td>
                        
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
        document.getElementById("userID").value = this.cells[0].innerHTML;
        document.getElementById("firstName").value = this.cells[1].innerHTML;
        document.getElementById("middleName").value = this.cells[2].innerHTML;
        document.getElementById("lastName").value = this.cells[3].innerHTML;
        document.getElementById("contactNumber").value = this.cells[4].innerHTML;
        document.getElementById("email").value = this.cells[5].innerHTML;
        document.getElementById("idType").value = this.cells[6].innerHTML;
        document.getElementById("idNumber").value = this.cells[7].innerHTML;
      

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>