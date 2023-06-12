<?php 

 include '../config/connection.php';
 date_default_timezone_set('Asia/Manila');


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
              <h5 class="card-title">Car Details</h5>

              <?php 
                  if(($_SESSION['messageResult']) != ""){?>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['messageResult']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <?php
                  $_SESSION['messageResult'] = "";
                  }
              ?>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="add-seats.php" method="post">

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Car ID <span
                      class="require">*</span></label>
                  <input type="text" class="form-control" maxlength="11" id="inputPassword5" style="cursor:not-allowed" name="carID" value="<?=$_POST['carID']?>" autocomplete="off" required readonly>
                </div>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Plate Number <span class="require">*</span></label>
                  <input type="text" class="form-control" id="inputPassword5" name="plateNumber" style="cursor:not-allowed" value="<?=$_POST['plateNumber']?>" min="1" required readonly>
                  
                </div>

                <h5 class="card-title">Routes Details</h5>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlLD_QkZd5kw0AqsMygwrxQyxsipt1isY&libraries=places"></script>
                <script>
                    function initialize() {
                        var input = document.getElementById('location-input');
                        var options = {
                            componentRestrictions: { country: 'PH' } // Limit suggestions to the Philippines
                        };
                        var autocomplete = new google.maps.places.Autocomplete(input, options);
                        autocomplete.addListener('place_changed', function() {
                            var place = autocomplete.getPlace();
                            if (place.geometry) {
                                var locationDetails = {
                                    name: place.name,
                                    address: place.formatted_address,
                                    latitude: place.geometry.location.lat(),
                                    longitude: place.geometry.location.lng()
                                };
                                console.log(locationDetails);
                                // You can send the locationDetails object to your PHP script via AJAX or perform any other required operation
                            }
                        });
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>

                <script>
                    function initialize() {
                        var input = document.getElementById('location-input2');
                        var options = {
                            componentRestrictions: { country: 'PH' } // Limit suggestions to the Philippines
                        };
                        var autocomplete = new google.maps.places.Autocomplete(input, options);
                        autocomplete.addListener('place_changed', function() {
                            var place = autocomplete.getPlace();
                            if (place.geometry) {
                                var locationDetails = {
                                    name: place.name,
                                    address: place.formatted_address,
                                    latitude: place.geometry.location.lat(),
                                    longitude: place.geometry.location.lng()
                                };
                                console.log(locationDetails);
                                // You can send the locationDetails object to your PHP script via AJAX or perform any other required operation
                            }
                        });
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>

                
           
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Starting Point <span
                      class="require">*</span></label>
                  <input type="text" class="form-control" id="location-input"  name="startingPoint" required>
                </div>


                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Destination Point <span
                      class="require">*</span></label>
                  <input type="text" class="form-control" id="location-input2" name="destinationPoint" required>
                </div>



                <div class="col-md-4">
                    <label for="inputPassword5" class="form-label">Date of Carpook <span class="require">*</span></label>
                    <input type="date" class="form-control" id="deptTime" name="dateSet" required min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Departure Time <span
                      class="require">*</span></label>
                  <input type="time" class="form-control" id="deptTime" name="departureTime" required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Arrival Time <span
                      class="require">*</span></label>
                  <input type="time" class="form-control" id="deptTime" name="arrivalTime" required>
                </div>


              
                <div class="text-center" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-success col-md-3"><i class="bi bi-car-front-fill"></i>
                    Request for Approval</button>
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