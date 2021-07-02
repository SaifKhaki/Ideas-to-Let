<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
		$ideaID = $_GET['ideaID'];
		$id = $_SESSION['user_id'];
        if (isset($_POST['submit'])) {
			$s_cond1 = (isset($_POST['standardCond1'])) ? mysqli_real_escape_string($mysqli, $_POST['standardCond1']) : '0';
			$s_cond2 = (isset($_POST['standardCond2'])) ? mysqli_real_escape_string($mysqli, $_POST['standardCond2']) : '0';
			$s_cond3 = (isset($_POST['standardCond3'])) ? mysqli_real_escape_string($mysqli, $_POST['standardCond3']) : '0';
			$s_price = (isset($_POST['standardPrice'])) ? mysqli_real_escape_string($mysqli, $_POST['standardPrice']) : '0';
			$s_comment = (isset($_POST['standardComment'])) ? mysqli_real_escape_string($mysqli, $_POST['standardComment']) : '0';
			$p_cond1 = (isset($_POST['premiumCond1'])) ? mysqli_real_escape_string($mysqli, $_POST['premiumCond1']) : '0';
			$p_cond2 = (isset($_POST['premiumCond2'])) ? mysqli_real_escape_string($mysqli, $_POST['premiumCond2']) : '0';
			$p_cond3 = (isset($_POST['premiumCond3'])) ? mysqli_real_escape_string($mysqli, $_POST['premiumCond3']) : '0';
			$p_price = (isset($_POST['premiumPrice'])) ? mysqli_real_escape_string($mysqli, $_POST['premiumPrice']) : '0';
			$p_comment = (isset($_POST['premiumComment'])) ? mysqli_real_escape_string($mysqli, $_POST['premiumComment']) : '0';
			$result2 = mysqli_query($mysqli, "INSERT INTO `idea_premium`(`idea_id`,`cond1`,`cond2`,`cond3`,`comments`,`price`) VALUES('$ideaID','$p_cond1','$p_cond2','$p_cond3','$p_comment','$p_price')");
			$result1 = mysqli_query($mysqli, "INSERT INTO `idea_standard`(`idea_id`,`cond1`,`cond2`,`cond3`,`comments`,`price`) VALUES('$ideaID','$s_cond1','$s_cond2','$s_cond3','$s_comment','$s_price')");
			header("Location: D-YoutubePage.php?id= echo $ideaID;");
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
	<link rel="stylesheet" type="text/css" href="..\Css\S-SignupPage.css">
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
	<div id="firstSection" class="row container-fluid text-dark m-0 p-0 mt-5 py-5 justify-content-center">
		<div class="row col-10 m-0 p-0 mt-5 justify-content-center rounded border border-secondary">
			<div class="col-6 m-0 p-0 d-none d-xl-block align-self-center">
				<img src="..\to be use\bonFiresize1.png" class="img-fluid m-0 p-0" width="100%"  alt="pic">
			</div>
			<div class="row col-12 col-xl-6 m-0 p-0 bg-gray">
				<form method="POST" class="m-0 p-0 rounded">
					<div class="row col-12 pt-3 m-0 justify-content-center">
						<h2 class="text-white col-12 text-center text-dark">PRICING PACKAGES</h2>
						<div class="row col-lg-6 col-xl-12 no-gutters">
							<label class="col-12 my-0 py-0 mt-3 font-weight-bold text-center text-xl-left">Standard</label>
							<fieldset class="col-12 col-xl-7 row form-group mb-0 pb-0 mt-4 ml-2">
								<div class="row col-12 justify-content-start">
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="standardCond1" id="gridRadios1" value="1">
										<label class="form-check-label" for="gridRadios1">
											Includes issuing copyrights
										</label>
									</div>
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="standardCond2" id="gridRadios2" value="1">
										<label class="form-check-label" for="gridRadios2">
											Self Participation
										</label>
									</div>
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="standardCond3" id="gridRadios5" value="1">
										<label class="form-check-label" for="gridRadios5">
											Loose Ownership
										</label>
									</div>
								</div>
							</fieldset>
							<div class="row col-12 col-xl-5">
								<label class="col-4 my-0 py-0 font-weight-bold align-self-center">Pricing:</label>
								<div class="form-group col-7 align-self-center">
									<input type="number" name="standardPrice" class="form-control no-outline input1 bg-gray text-dark text-center" id="exampleInputPassword1" placeholder="Price">
								</div>
								<label class="col-1 m-0 p-0 font-weight-bold align-self-center">$</label>
							</div>
							<div class="form-group col-12">
								<input type="text" name="standardComment" class="form-control no-outline input1 bg-gray text-dark" placeholder="Comments">
							</div>
						</div>
						<div class="row col-lg-6 col-xl-12 no-gutters">
							<label class="col-12 py-0 m-0 mt-3 font-weight-bold text-center text-xl-left">Premium</label>
							<fieldset class="col-12 col-xl-7 row form-group mb-0 pb-0 mt-4 ml-2">
								<div class="row col-12 justify-content-start">
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="premiumCond1" id="gridRadios4" value="1">
										<label class="form-check-label" for="gridRadios4">
											Includes issuing copyrights
										</label>
									</div>
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="premiumCond2" id="gridRadios5" value="1">
										<label class="form-check-label" for="gridRadios5">
											Self Participation
										</label>
									</div>
									<div class="form-check col-12">
										<input class="form-check-input" type="checkbox" name="premiumCond3" id="gridRadios6" value="1">
										<label class="form-check-label" for="gridRadios6">
											Loose Ownership
										</label>
									</div>
								</div>
							</fieldset>
							<div class="row col-lg-12 col-xl-5">
								<label class="col-4 my-0 py-0 font-weight-bold align-self-center">Pricing:</label>
								<div class="form-group col-7 align-self-center">
									<input type="text" name="premiumPrice" class="form-control no-outline input1 bg-gray text-dark text-center" id="exampleInputPassword1" placeholder="Price">
								</div>
								<label class="col-1 m-0 p-0 font-weight-bold align-self-center">$</label>
							</div>
							<div class="form-group col-12">
								<input type="text" name="premiumComment" class="form-control no-outline input1 bg-gray text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Comments">
							</div>
						</div>
						<div class="row col-12 justify-content-center mb-3">
							<input value="Apply for YouTube" type="submit" name="submit" class="col-auto text-secondary btn btn-outline-secondary bg-scheme2 btn-sm px-3" type="button">
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
						<h1>Support me on PATREON</h1>
						<p class="mt-3 text-secondary">
							I will be very thankful for your every step towards the success of my idea.
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
