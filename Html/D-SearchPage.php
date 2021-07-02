<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        
    }else{
        header("Location: S-SigninPage.php");
    }
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="..\Css\common.css">
	<link rel="stylesheet" type="text/css" href="..\Css\menubar.css">
	<link rel="stylesheet" type="text/css" href="..\Css\D-SearchPage.css">
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
	<script type="text/javascript" src="..\js\common.js"></script>
</head>
<body class="m-0 p-0">
	<div class="container-fluid m-0 p-0 fixed-top">
    <nav class="row justify-content-center navbar navbar-light navbar-expand-lg fixed-top">
            <div class="row text-lg-right">
                <a href="D-DashboardPage.php" class="col-xs-1 row navbar-brand text-white">
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
                        <a class="nav-link text-white" href="S-HomePage.php" tabindex="-1" aria-disabled="true">Home</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-SettingsPage.php" tabindex="-1" aria-disabled="true">Settings</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-StrategiesPage.html" tabindex="-1" aria-disabled="true">Strategies</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-ContactPage.html" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  
	<div id="searchSection" class="container-fluid justify-content-center d-flex no-gutters p-0 mb-5 w-100">
        <form id="searchField" class="row col-12 justify-content-center form-inline my-2 my-lg-0 order-lg-last">
			<div class="row col-12 justify-content-center">
				<div class="row col-12 justify-content-center mb-5 ideaFont text-dark">
					<h4 class=" display-4 font-weight-bold">Search For Problems</h4>
				</div>
			</div>
		</form>
    </div>
    <div class="container-fluid justify-content-center d-flex no-gutters p-0 my-5 w-100">
        <div id="problemCreated" class="col-12 row p-3 mb-2">
            <div class="col-12 mb-2 text-secondary">
                <h4>Problems Created</h4>
            </div>
            <?php 
                $i=0;
                $result = mysqli_query($mysqli, "SELECT * FROM `problem_posted`;");
                while ($res = mysqli_fetch_array($result)) {
                    $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `problem_extended` WHERE `prob_id` = ".$res["prob_id"]));
                    echo ('
                    <a href="D-ProblemPage.php?id='.$res["prob_id"].'" class="text-decoration-none col-6 mt-2 ml-1 row justify-content-center">
                        <div class="row col-12 col-sm-9 col-md-12 rounded mb-2 ml-3 border border-black bg-gray p-0">
                            <div class="col-12 pt-3 pr-5 ">
                                <h4 class="card-title">'.$res["title"].'</h4>
                                <div class="row col-12">
                                    <div class="row col-12 pb-2">
                                        <p class="col-8 col-md-4 p-0 m-0">Solutions</p>
                                        <div class="col-3 col-md-3 float-right text-right">
                                            <span class="badge bg-secondary text-white py-2 px-3">'.$result2["count"].'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    ');
                    $i++;
                }
            ?>
        </div>
    </div>
    <div id="footerSection" class="row">
		<div class="col-12 row justify-content-center">
			<div class="col-10 line"></div>
		</div>
		<div class="col-12 row justify-content-around mt-5 mb-3 mb-lg-0">
			<div class="col-3 row justify-content-left">
				<a href="S-HomePage.php" class="text-dark col-12 col-sm-6 col-lg-3">Home</a>
				<a href="S-TermsAndConditionsPage.html" class="text-dark col-12 col-sm-6 col-lg-3">Terms</a>
				<a href="S-AboutPage.html" class="text-dark col-12 col-sm-6 col-lg-3">Info</a>
				<a href="S-ContactPage.html" class="text-dark col-12 col-sm-6 col-lg-3">Contact</a>
			</div>
			<div class="col-3 float-right text-right text-dark ">
				<p>All rights reserved 2020</p>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
