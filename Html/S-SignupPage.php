<?php
	include_once("config/config.php");
	session_start();
	if (isset($_POST['submit'])) {
		$fname = mysqli_real_escape_string($mysqli, $_POST['f_name']);
		$lname = mysqli_real_escape_string($mysqli, $_POST['l_name']);
		$email = mysqli_real_escape_string($mysqli, $_POST['e_mail']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
		$emailCheck = mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `email` = '$email')");
		$emailErr = false;
		if (mysqli_num_rows($emailCheck)==0) {
			$result = mysqli_query($mysqli, "INSERT INTO `user_table`(`f_name`,`l_name`,`email`,`e_password`) VALUES('$fname','$lname','$email','$password')");
			$userId = mysqli_query($mysqli, "SELECT user_id FROM `web_project`.`user_table` WHERE ( `email` = '$email' ) LIMIT 1;");
			$_SESSION['user_id'] = $userId;
			if (isset($_SESSION['user_id'])) {
				header("Location: D-DashboardPage.php");	
			}
		}
		else{
			$emailErr = true;
		}
	}
	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="..\Css\common.css">
	<link rel="stylesheet" type="text/css" href="..\Css\S-SignupPage.css">
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
	<script type="text/javascript" src="..\js\common.js"></script>
	<script>
		$(document).ready(function () {
			$email_err = "<?php echo $emailErr;?>";
			if ($email_err) {
				$("#emailErr").removeClass('d-none');
			}
		});
	</script>
</head>
<body class="m-0 p-0">
	<div class="container-fluid m-0 p-0 fixed-top">
        <nav class="row justify-content-center navbar navbar-light navbar-expand-lg fixed-top">
            <div class="row text-lg-right">
                <a href="S-HomePage.php" class="col-xs-1 row navbar-brand text-white">
                    <img src="..\to be use\fire2.png" alt="Bulb" class="border-0 border-white mr-sm-3 col-sm-2 d-xs-inline">
                    Ideas To Let
                </a>
                <button class="col-xs navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-8 row justify-content-center collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav row justify-content-center text-center">
                    <li class="nav-item mr-lg-2 order-lg-last">
                        <a class="nav-link" href="S-SigninPage.php" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Sign In</button>
                        </a>
					</li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-HomePage.php" tabindex="-1" aria-disabled="true">Home</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-StrategiesPage.html" tabindex="-1" aria-disabled="true">Strategies</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-TermsAndConditionsPage.html" tabindex="-1" aria-disabled="true">Terms</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-ContactPage.html" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  
	<div id="firstSection" class="row container-fluid text-dark mt-5 py-5 justify-content-center">
		<div class="row col-10 m-0 p-0 mt-5 justify-content-center rounded border border-secondary">
			<div class="col-6 m-0 p-0 d-none d-lg-block align-self-center">
				<img src="..\to be use\bonFiresize1.png" class="img-fluid m-0 p-0" width="100%"  alt="pic">
			</div>
			<div class="row col-12 col-lg-6 m-0 p-0 bg-gray">
				<form action="" method="POST" class="m-0 p-0 h-100">
					<div class="row col-12 justify-content-center pt-3 m-0 h-100">
						<h2 class="text-white col-12 text-center text-dark">SIGN UP</h2>
						<label class="col-12 my-0 py-0 font-weight-bold">Username:</label>
						<div class="form-group col-12 col-sm-6">
							<input type="text" class="form-control no-outline input1 bg-gray" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="f_name">
						</div>
						<div class="form-group col-12 col-sm-6">
							<input type="text" class="form-control no-outline input1 bg-gray" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="l_name">
						</div>
						<label class="col-12 my-0 py-0 font-weight-bold">Email:</label>
						<div class="form-group col-12">
							<input type="email" class="form-control no-outline input1 bg-gray" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="e_mail">
							<label id="emailErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*email already exists.</label>
						</div>
						<label class="col-12 my-0 py-0 font-weight-bold">Password:</label>
						<div class="form-group col-12">
							<input type="password" class="form-control no-outline input1 bg-gray" id="exampleInputPassword1" placeholder="Password" name="password">
						</div>
						<label class="col-12 my-0 py-0 font-weight-bold">Confirm Password:</label>
						<div class="form-group col-12">
							<input type="password" class="form-control no-outline input1 bg-gray" id="exampleInputPassword1" placeholder="Confirm Password" name="conPassword">
							<label id="passwordErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*password don't match.</label>
						</div>
						<div class="row col-12 justify-content-center mb-3">
							<input class="col-6  text-secondary btn btn-outline-secondary bg-scheme2 btn-sm px-3 mr-3" type="submit" name="submit" value="Sign Up">
							<div class="col-12 text-center mt-3">
								Already signed up? 
								<a id="signInLink" href="S-SigninPage.php">Sign in</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>    
    <div id="lastSection" class="container-fluid no-gutters">
		<div class="row">
            <div class="d-none d-md-block col-md-5 text-center" style="height: 100%;">
				
			</div>
			<div class="col-12 col-md-7">
				<div class="col-12 pt-5">
					<div class="text-center mt-5 text-secondary">
						<h1>Support IDEA on PATREON</h1>
						<p class="mt-3 text-secondary">
							Ideas need your support to provide with more facilities along with securing the platform for idea sharing.
						</p>
						<a href="https://www.patreon.com/bePatron?u=32681898" data-patreon-widget-type="become-patron-button">
							<button class="btn btn-outline-secondary px-5 py-2" type="button">Visit IDEAS Patreon Page</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-12 row justify-content-center">
                <div class="col-10 line"></div>
            </div>
            <div class="col-12 row justify-content-around mt-5 mb-3 mb-lg-0">
                <div class="col-3 row justify-content-left">
					<a href="S-HomePage.php" class="col-12 col-sm-6 col-lg-3">Home</a>
                    <a href="S-TermsAndConditionsPage.html" class="col-12 col-sm-6 col-lg-3">Terms</a>
                    <a href="S-AboutPage.html" class="col-12 col-sm-6 col-lg-3">Info</a>
                    <a href="S-ContactPage.html" class="col-12 col-sm-6 col-lg-3">Contact</a>
                </div>
                <div class="col-3 float-right text-right">
                    <p>All rights reserved 2020</p>
                </div>
            </div>
        </div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

