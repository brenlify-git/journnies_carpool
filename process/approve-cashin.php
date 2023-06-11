<?php 
// session_start();
include '../config/connection.php';


$sql = "SELECT * FROM cashin_cashout INNER JOIN user ON cashin_cashout.uID = user.uID  WHERE transConfirmStatus = 0";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journnies | Transaction Approval</title>
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
      <h1>Transaction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboards/dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Transaction</li>
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
              <form class="row g-3" action="../reg_inserts/cash-approvisation.php" method="post">

              <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Transaction ID  <span class="require">*</span></label>
                  <input type="text" class="form-control"  id="transID" name="transID" value="" required>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">User ID  <span class="require">*</span></label>
                  <input type="text" class="form-control"  id="userID" name="userID" value="" required>
                </div>

              <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Receipient's Name  <span class="require">*</span></label>
                  <input type="text" class="form-control"  id="fullName" name="fullName" value="" required>
                </div>

              <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Sender Number <span class="require">*</span></label>
                  <input type="text" class="form-control" maxlength="11" id="senderNum" name="senderNum" value="" required>
                </div>


                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Withdraw Amount <span class="require">*</span></label>
                  <input type="text" pattern="^\d+(\.\d+)?$" class="form-control" id="amount" name="amount" value="" required>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Transaction Type <span class="require">*</span></label>
                  <input type="text" class="form-control" id="transType" name="transType" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Reference No. <span class="require">*</span></label>
                  <input type="number" class="form-control" id="refNum" name="refNum" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Conversion Fee <span class="require">*</span></label>
                  <input type="number" max="99999999" class="form-control" id="conFee" name="conFee" value="" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Processing Fee <span class="require">*</span></label>
                  <input type="number" max="99999999" class="form-control" id="proFee" name="proFee" value="" required>
                </div>

                <div class="text-center buttonsResponse">
                  <button type="submit" class="btn btn-primary" id="accept-button" name="accept">+ Accept
                    </button>
                  <button type="submit" class="btn btn-success" name="decline">- Decline</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card">
            <div class="card-body">

              <h2 class="card-title ">Transaction Approval Request | <span>Subject to approval</span></h2>


              

                <div class="overflow-auto mt-4">

                  <!-- Table with stripped rows -->
                  <table class="table table-hover table-bordered text-nowrap text-center"
                    style="max-height: 695px; overflow: auto; display: inline-block;" id="table">
                    <thead class="table-dark" style="position:sticky; top: 0 ;">
                      <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Recepients Name</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">GCash Number</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Conversion Fee</th>
                        <th scope="col">Processing Fee</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                  while($tbl_patrons = mysqli_fetch_assoc($id)):   

                    
                ?>
                      <tr>

                        <td><?= $tbl_patrons['transID'];?></td>
                        <td><?= $tbl_patrons['uID'];?></td>
                        <td><?= $tbl_patrons['uFirstName'] . " " . $tbl_patrons['uLastName']?></td>
                        <td><?= $tbl_patrons['transType'];?></td>
                        <td><?= $tbl_patrons['transGCashNumber'];?></td>
                        <td><?= $tbl_patrons['transReferenceNo'];?></td>
                        <td><?= $tbl_patrons['transAmount'];?></td>
                        <td><?= $tbl_patrons['transConFee'];?></td>
                        <td><?= $tbl_patrons['transProFee'];?></td>
                        </td>

                      </tr>



                      <?php
          endwhile;
          ?>

                    </tbody>
                  </table>


          
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
        document.getElementById("transID").value = this.cells[0].innerHTML;
        document.getElementById("userID").value = this.cells[1].innerHTML;
        document.getElementById("fullName").value = this.cells[2].innerHTML;
        document.getElementById("transType").value = this.cells[3].innerHTML;
        document.getElementById("senderNum").value = this.cells[4].innerHTML;
        document.getElementById("refNum").value = this.cells[5].innerHTML;
        document.getElementById("amount").value = this.cells[6].innerHTML;
        document.getElementById("conFee").value = this.cells[7].innerHTML;
        document.getElementById("proFee").value = this.cells[8].innerHTML;

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>