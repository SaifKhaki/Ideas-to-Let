<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
		$ideaID = $_GET['id'];
		$id = $_SESSION['user_id'];
		
		$p_cond1 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_premium` WHERE ( `idea_id` = '$ideaID')"))['cond1'];
		$p_cond2 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_premium` WHERE ( `idea_id` = '$ideaID')"))['cond2'];
		$p_cond3 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_premium` WHERE ( `idea_id` = '$ideaID')"))['cond3'];
		$p_comment = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_premium` WHERE ( `idea_id` = '$ideaID')"))['comments'];
		$p_price = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_premium` WHERE ( `idea_id` = '$ideaID')"))['price'];
		
		$s_cond1 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_standard` WHERE ( `idea_id` = '$ideaID')"))['cond1'];
		$s_cond2 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_standard` WHERE ( `idea_id` = '$ideaID')"))['cond2'];
		$s_cond3 = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_standard` WHERE ( `idea_id` = '$ideaID')"))['cond3'];
		$s_comment = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_standard` WHERE ( `idea_id` = '$ideaID')"))['comments'];
		$s_price = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_standard` WHERE ( `idea_id` = '$ideaID')"))['price'];
		if (isset($_POST['submit1'])) {
			$result1 = mysqli_query($mysqli, "INSERT INTO `ideas_purchased`(`user_id`,`idea_id`) VALUES('$id','$ideaID')");	
			header("Location: D-ShopPage.php");
		}else if (isset($_POST['submit2'])) {
			$result2 = mysqli_query($mysqli, "INSERT INTO `ideas_purchased`(`user_id`,`idea_id`) VALUES('$id','$ideaID')");
			header("Location: D-ShopPage.php");
		}
    }else{
        header("Location: S-SigninPage.php");
    }
	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pricing</title>
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="..\Css\common.css">
	<link rel="stylesheet" type="text/css" href="..\Css\S-StrategiesPage.css">
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
	<script type="text/javascript" src="..\js\common.js"></script>
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
            <div class="col-xs-12 col-md-9 row justify-content-center collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav row justify-content-center text-center">
                    <li class="nav-item mt-1 mr-lg-4 d-lg-none text-center">
                        <img src="..\to be use\man.png" alt="avatar" class="rounded-circle border border-black img-fluid" width="100%">
					</li>
					<li class="nav-item mr-lg-2 order-lg-last">
                        <a class="nav-link" href="D-SearchPage.php" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Search Problems</button>
                        </a>
					</li>
                    <li class="nav-item mr-lg-2 order-lg-last">
                        <a class="nav-link" href="D-PostProblemPage.php" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post a Problem</button>
                        </a>
					</li>
					<li class="nav-item order-lg-last">
                        <a class="nav-link" href="D-PostIdeaPage.php" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post an Idea</button>
                        </a>
					</li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-DashboardPage.php" tabindex="-1" aria-disabled="true">Dashboard</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-SettingsPage.php">Settings</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
	<div id="firstSection" class="container-fluid row justify-content-center m-0 p-0 pt-5">
		<div class="row p-0 justify-content-center w-100">
			<div class="container row justify-content-center">
				<div id="content" class="col-12 col-md-7 row col-lg-8 m-0 pt-5 justify-content-center">
					<div class="text-center justify-content-center row mt-5">
						<h1>Packages <small>from seller</small></h1>
						<p class="my-3">
							Each seller creates packages for clients by including points in each package.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div id="packages" class="row col-10 m-0 p-0 justify-content-center rounded mt-2 mt-5 mt-lg-0">
			<div class="row col-12 col-md-6 m-0 p-0 bg-gray justify-content-center">
				<form method="POST" class="m-0 p-0 h-100">
					<div class="row col-12 pt-3 m-0 justify-content-center">
						<h4 class="text-white col-12 text-center text-dark">STANDARD PACKAGE</h4>
						<div class="row col-12 no-gutters">
							<div class="row col-12">
								<label class="col-12 my-0 py-0 font-weight-light align-self-center text-center price"><small>$</small><?php echo $s_price;?></label>
							</div>
							<fieldset class="col-12 row form-group mb-0 pb-0 mt-4 ml-2">
								<div class="row col-12 justify-content-start">
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox" id="gridRadios1" onclick="return false;" <?php echo $s_cond1==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios1">
											Includes issuing copyrights
										</label>
									</div>
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox" id="gridRadios2" onclick="return false;" <?php echo $s_cond2==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios2">
											Self Participation
										</label>
									</div>
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox" id="gridRadios3" onclick="return false;" <?php echo $s_cond3==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios3">
											Loose Ownership
										</label>
									</div>
								</div>
							</fieldset>
							<div class="form-group col-12">
								<p class="my-3 text-center">
									<?php echo $s_comment;?>
								</p>
							</div>
						</div>
						<div class="row col-12 justify-content-center mb-3">
							<input type="submit" name="submit1" value="Buy Package" class="col-6 text-secondary btn btn-outline-secondary bg-scheme btn-sm px-3 mr-3">
						</div>
					</div>
				</form>
			</div>
			<div class="row col-12 col-md-6 m-0 p-0 bg-gray justify-content-center border-secondary mt-4 mt-md-0">
				<form method="POST" class="m-0 p-0 h-100">
					<div class="row col-12 pt-3 m-0 justify-content-center">
						<h4 class="text-white col-12 text-center text-dark">PREMIUM PACKAGE</h4>
						<div class="row col-12 no-gutters">
							<div class="row col-12">
								<label class="col-12 my-0 py-0 font-weight-light align-self-center text-center price"><small>$</small><?php echo $p_price;?></label>
							</div>
							<fieldset class="col-12 row form-group mb-0 pb-0 mt-4 ml-2">
								<div class="row col-12 justify-content-start">
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox"id="gridRadios4" onclick="return false;" <?php echo $p_cond1==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios4">
											Includes issuing copyrights
										</label>
									</div>
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox" id="gridRadios5" onclick="return false;" <?php echo $p_cond2==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios5">
											Self Participation
										</label>
									</div>
									<div class="form-check col-12 mb-3">
										<input class="form-check-input" type="checkbox" id="gridRadios6" onclick="return false;" <?php echo $p_cond3==1?'checked':'';?>>
										<label class="form-check-label" for="gridRadios6">
											Loose Ownership
										</label>
									</div>
								</div>
							</fieldset>
							<div class="form-group col-12">
								<p class="my-3 text-center">
									<?php echo $p_comment;?>
								</p>
							</div>
						</div>
						<div class="row col-12 justify-content-center mb-3">
							<input type="submit" name="submit2" value="Buy Package" class="col-6 text-secondary btn btn-outline-secondary bg-scheme btn-sm px-3 mr-3">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="footerSection" class="row mt-5 justify-content-center">
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
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
