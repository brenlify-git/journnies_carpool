<?php 

 include '../config/connection.php';


 $carID = $_GET['id'];

 $sql = "SELECT * FROM car_seat WHERE carID = '$carID'";
$id = $conn->query($sql);

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .require {
            color: red;
          
        }
    </style>


<script type="text/javascript">
    $(document).ready(function(){
        var html = '<tr><td><div class="col-md-12"><input type="text" class="form-control text-center" name="seatType[]" required></div></td><td><div class="col-md-12"><input type="number" step="any" class="form-control text-center" name="conFee[]" required></div></td><td><div class="col-md-12"><input type="button" class="btn btn-danger form-control" id="remove" name="remove" value="Remove" required></div></td></tr>';
        
        var max = 12;
        var x=1;

        $("#add1").click(function(){
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }
        });


        $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
            x--;
        });
    });
</script>

</head>

<body>
    <!-- ======= Sidebar and Header ======= -->
    <?php include '../headerbars/headerbar-passenger.php';?>
    <?php include '../sidebars/sidebar-passenger.php';?>

    <!-- End Sidebar and Header-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Seat Details</h1>
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
                            <form class="insert-form" id="insert_form" method="post">
                                <h2 class="card-title">You are adding a car seat for car <b><?=$carID?></b></h2>
                                <div class="input-field">
                                   <table class="table table-bordered text-center" id="table_field">
                                        <tr>
                                            <th>Seat Type Location</th>
                                            <th>Convenience Fee</th>
                                            <th>Action</th>
                                        </tr>

                                        <?php

                                        include '../config/connection.php';

                                        if (isset($_POST['save'])){
                                            $txtSeatType = $_POST['seatType'];
                                            $txtConFee = $_POST['conFee'];
                                            $carID = $_GET['id'];

                                            foreach ($carID as $key => $value){
                                                $save = "INSERT INTO car_seat (carID, seatTypeAvailable, convenienceFee) VALUES ('$carID','$txtSeatType[$key]', '$txtConFee[$key]')";
                                                $query = mysqli_query($conn, $save);
                                            }

                                            

                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-center" name="seatType[]" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-12">
                                                    <input type="number" class="form-control text-center" name="conFee[]" step="any" required>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="col-md-12">
                                                    <input type="button" class="btn btn-warning form-control" id="add1" name="add1" value="Add" required>
                                                </div>
                                            </td>
                                        </tr>
                                   </table>

                                   <center>
                                   <input type="submit" class="btn btn-success" id="save" name="save" value="Save Seats" required>
                                   </center>
                                    
                                </div>
                            </form>
                        </div>
                    </div>


                     <!-- table starts here -->
      
                <div class="card"> 
                  <div class="card-body">
                    <h2 class="card-title ">Sorted according to the cars that are accepted by the admins</h2>
                    <div class="overflow-auto mt-4">
                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 600px;">
                      <thead class="table-secondary" style="position:sticky; top: 0 ;">
                        <tr>
                          <th scope="col">Seat ID</th>
                          <th scope="col">Seat Type</th>
                          <th scope="col">Convenience Fee</th>
                          <th scope="col">Registration Time</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        $i = 0;
                        while($tbl_patrons = mysqli_fetch_assoc($id)): 
                            
                            $i++;
                      ?>
                      <form action="add-route.php" method="post" enctype="multipart/form-data">

                        <tr class="text-center">
                      

                        <td>SEAT00-<?= $i ?></td>
                        <td><?= $tbl_patrons['seatTypeAvailable'];?></td>
                        <td><?= $tbl_patrons['convenienceFee'];?></td>
                        <td><?= $tbl_patrons['seatRegTime'];?></td>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

 

</body>

</html>