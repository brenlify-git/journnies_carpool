<?PHP

session_start();
include '../config/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>RideSharer | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/logo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-login/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts-login/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-login/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-login/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-login/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

	<!--===============================================================================================-->
</head>

<body>




	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../assets/img/Logo_Login.png" alt="IMG">
				</div>

				<form class="login100-form validate-form col-md-6" method="post" action="index.php">
					<span class="login100-form-title">
						Welcome back, Ridesharers!
						<span class="login100-form-subtitle">
							Login your credentials here.
						</span>
					</span>

					
					

					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100 uname" type="text" name="Username" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="Pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="text-center" style="color:#345ba3">


					<?php
					
					if(isset($_SESSION['messageLogin'])){
						echo $_SESSION['messageLogin'];
					}
				
			
					?>
                    </div>

					

				
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" >
							Login
						</button>
					</div>
					<div class="text-center p-t-12">
						<a href="../reg_inserts/registration-account.php">
						<span>
							Doesn't have an account?
						</span>
						<!-- Button trigger modal -->
						<span>
							Sign Up here.
						</span>
						</a>
						
					</div>
					
					

					<div class="text-center p-t-136">
						<a class="txt2" href="https://national-u.edu.ph/" target="_blank">
							Take a look to the current happenings.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php 
	if(isset($_POST['login'])){
		$Username = $_POST['Username'];
		$Pass = $_POST['Pass'];

		$select = mysqli_query($conn, "SELECT * FROM user WHERE uUsername = '$Username' AND uPassword = '$Pass' AND (uUserType = 'Passenger' OR uUserType = 'Driver') AND uUserVerify_Reg = '1'");
		$row = mysqli_fetch_array($select);

		$select2 = mysqli_query($conn, "SELECT * FROM user WHERE uUsername = '$Username' AND uPassword = '$Pass' AND uUserType = 'Admin'");
		$row2 = mysqli_fetch_array($select2);

		if(is_array($row)){
			$_SESSION['passenger_email'] = $row['uUsername'];
			$_SESSION['passenger_password'] = $row['uPassword'];
			$_SESSION['Patron_Type'] = $row['uUserType'];
			$_SESSION['firstName'] = $row['uFirstName'];
			$_SESSION['lastName'] = $row['uLastName'];
			$_SESSION['userID'] = $row['uID'];
			$_SESSION['email'] = $row['uEmail'];
			$_SESSION['messageResult'] = '';
			$_SESSION['CarRegistrationStatus'] = '';
			$_SESSION['messageLogin'] = 'Successfully Logged Out!';
			header("Location:../dashboards/dashboard-passenger.php");
			exit();
		}
		else if(is_array($row2)){
			$_SESSION['passenger_email'] = $row2['uUsername'];
			$_SESSION['passenger_password'] = $row2['uPassword'];
			$_SESSION['Patron_Type'] = $row2['uUserType'];
			$_SESSION['firstName'] = $row2['uFirstName'];
			$_SESSION['lastName'] = $row2['uLastName'];
			$_SESSION['userID'] = $row2['uID'];
			$_SESSION['email'] = $row2['uEmail'];
			$_SESSION['messageResult'] = '';
			$_SESSION['CarRegistrationStatus'] = '';
			$_SESSION['idApprovalStatus'] = '';
			$_SESSION['messageLogin'] = 'Successfully Logged Out!';
			header("Location:../dashboards/dashboard.php");
			exit();
		}
		else{
			$_SESSION['unameused'] = $Username;
			$_SESSION['messageLogin'] = "Invalid login credentials, try again!";
			header("Location:index.php");
			exit();

		}
		
	}
?>

	</div>
	</div>
	</div>





	

	<!--===============================================================================================-->
	<script src="vendor-login/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/bootstrap/js/popper.js"></script>
	<script src="vendor-login/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor-login/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="assets/js/login.js"></script>

</body>

</html>