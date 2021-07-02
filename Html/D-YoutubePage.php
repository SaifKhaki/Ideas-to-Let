<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
		$ideaID = $_GET['id'];
		
        if (isset($_POST['submit'])) {
            
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
	<title>Upload Video</title>
	<!-- icon fonts for upload iimage icon-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="..\Css\common.css">
	<link rel="stylesheet" type="text/css" href="..\Css\D-YoutubePage.css">
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
	<script type="text/javascript" src="..\js\common.js"></script>
	<script>
		$(document).ready(function () {
            setInterval(function(){
                if ($('input[id=file1]').val() != "") {
                    $filename = $('input[id=file1]').val().split("\\");
                    $("label[for=file1]").text($filename[$filename.length-1]);
                }
            },1000);
		});
	</script>
</head>
<body class="m-0 p-0 no-gutters">
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
            <div class="col-xs-12 col-md-10 row justify-content-center collapse navbar-collapse" id="collapsibleNavId">
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
                        <a href="D-PostProblemPage.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post a Problem</button>
                        </a>
					</li>
					<li class="nav-item order-lg-last">
                        <a href="D-PostIdeaPage.php" class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post an Idea</button>
                        </a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a href="D-DashboardPage.php" class="nav-link text-white" href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a href="D-SettingsPage.php" class="nav-link text-white" href="#">Settings</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a href="S-StrategiesPage.html" class="nav-link text-white" href="#" tabindex="-1" aria-disabled="true">Startegies</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a href="D-ShopPage.php" class="nav-link text-white" href="#" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  
	<div id="firstSection" class="container-fluid m-0 p-0">
		<div class="row p-0 justify-content-center w-100">
			<div class="container row pt-5">
				<div id="content" class="col-12 col-md-7 row col-lg-8 m-0 pt-5 mt-5 justify-content-center">
					<div class="text-center justify-content-center row mt-5">
						<h1>Get Sponsors from YOUTUBE</h1>
						<p class="my-3">
							Best idea submitted in every week will be uploaded on our YouTube channel which will help the seller to grow their idea and reach out to a bigger community.
						</p>
						<div class="row col-6 justify-content-center align-self-center">
                            <form method="POST">
                                <input type="submit" value="Apply and Submit IDEA" name="submit" class="btn px-5 text-dark bg-scheme2 btn-lg ">
                            </form>
                        </div>
					</div>
				</div>
				<div id="diag" class="d-none d-md-block col-5 col-lg-4 m-0 pt-3 pl-5 mt-5 mt-xl-0">
					<img src="..\to be use\youtube phone.png" alt="bulb" class="mt-5 ml-5">
                </div>
			</div>
		</div>
	</div>
	<div class="row col-12 p-4 justify-content-center ">
        <p class="text-center col-12">Uploaded video will show below //site under construction</p>
		<div class="row col-10 col-md-8 embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
        </div>
	</div>
	<div id="footerSection" class="row">
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
