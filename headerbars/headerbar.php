<?php
include '../config/connection.php';

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

$sql = "SELECT * FROM car_details INNER JOIN user ON car_details.uID = user.uID WHERE uUserVerify_License = '0' AND car_verify = ''";
$notif = $conn->query($sql);

                                                                                            //accept status
$countNotif = mysqli_query($conn, "SELECT COUNT(*) AS notifCount FROM car_details WHERE car_verify = ''");
$row_countNotif = mysqli_fetch_assoc($countNotif);
$row_countNotification = $row_countNotif["notifCount"];


session_start();
if(!isset($_SESSION['passenger_email']) && $_SESSION['Patron_Type'] != 'Driver'){
  header("Location:../logins/index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
 

  <!-- Google Fonts -->
 
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../dashboards/dashboard.php" class="logo d-flex align-items-center">
    <img src="../assets/img/Logo Only.png" alt="">
    <span class="d-none d-lg-block">Journnies</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto" >
  <ul class="d-flex align-items-center">



    <li class="nav-item dropdown" >

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" >
        <i class="bi bi-bell"></i>
        
          <?php
          if($row_countNotification == 0){
            
          }
          else{
            echo '<span class="badge bg-primary badge-number">';
            echo $row_countNotification;
            echo '</span>';
          }
          ?>
        
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications overflow-auto" style="max-height: 300px;" >
        <li class="dropdown-header"  style="overflow:hidden;">
          

          <?php
          if($row_countNotification == 0){
            echo "Nothing to accept here.";
           
          }
          else{
            echo 'You have <span style="color:#026ab2; font-weight:bold">';
            echo $row_countNotification;
            echo '</span> new notifications';
          }
          ?>
         
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <?php
            while($rows = mysqli_fetch_assoc($notif)):   
        ?>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Registration Request</h4>
            <p><?=$rows['firstName']; ?> with an id <?= $rows['carID'];?> has a pending request</p>
           <button class="btn btn-warning text-dark col-md-12" style="color:aliceblue"><a style="text-decoration:none; color:aliceblue;" href="../create_membership/membership.php">Accept Now</a></button> 
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <?php
        endwhile;
        ?>
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->


  

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../assets/img/Logo_Login.png" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['firstName']. " " . $_SESSION['lastName']; ?></span>
      </a><!-- End Profile Iamge Icon -->



      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
        <h4><?php echo $_SESSION['userID']; ?></h4>
          <span><?php echo $_SESSION['email']; ?><br><?php echo $_SESSION['Patron_Type']; ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="../config/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span> Sign Out </a></span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

</body>
</html>