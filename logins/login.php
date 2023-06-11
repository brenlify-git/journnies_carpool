<?PHP
session_start();


include 'connection.php';

$sql = "SELECT * FROM user WHERE verifyStatus = 'Verified'";

$id = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/table.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.8.2.js"></script>
</head>
<body>

<div class="container mt-5">
    <?php
 
        if(isset($_SESSION['status'])){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
            unset($_SESSION['status']);
        }
            ?>
    

    <div class="row">
        <div class="col-lg-12">

          <!-- table starts here -->
      
                <div class="card"> 
                  <div class="card-body">
                  
                    <h2 class="card-title ">List of All Verified Users</h2>


                    <div class="overflow-auto mt-4">

    <table class="table table-hover datatable table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
                      <thead class="table-secondary" style="position:sticky; top: 0 ;">
                        <tr>
                    
                          <th scope="col">User ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Contact Number</th>
                          <th scope="col">Registration Status</th>
                          <th scope="col">Registration Time</th>
                          <th scope="col">User Type</th>
                          <th scope="col">Email</th>
                          <th scope="col">Address</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        while($tbl_bookinfo = mysqli_fetch_assoc($id)):   
                      ?>
                        <tr>
                      
                        <td><?= $tbl_bookinfo['userID'];?></td>
                          <th><?= $tbl_bookinfo['lastName'];?>, <?= $tbl_bookinfo['firstName'];?> <?= $tbl_bookinfo['middleName'];?></th>
                          <td><?= $tbl_bookinfo['contactNumber'];?></td>
                          <td><?= $tbl_bookinfo['verifyStatus'];?></td>
                          <td><?= $tbl_bookinfo['registrationTime'];?></td>
                          <td><?= $tbl_bookinfo['userType'];?></td>
                          <td><?= $tbl_bookinfo['email'];?></td>
                          <td><?= $tbl_bookinfo['street'];?>, <?= $tbl_bookinfo['barangay'];?>,
                        <?= $tbl_bookinfo['municipality'];?>, <?= $tbl_bookinfo['province'];?> </td>

            
                        </tr>

                        <?php
                endwhile;
                ?>
                      
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

              </form>
              </div>
            </div>
          </div>

         

        </div>
      </div>
</body>
</html>