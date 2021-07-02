<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
    }
    else{
        header("Location: S-SigninPage.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--External CSS-->
    <link rel="stylesheet" type="text/css" href="..\Css\common.css">
    <link rel="stylesheet" type="text/css" href="..\Css\menubar.css">
    <!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--My JS-->
    <script type="text/javascript" src="..\js\common.js"></script>
    <script type="text/javascript" src="..\js\menubar.js"></script>
</head>
<body class="m-0 p-0 pt-5">
	<div id="megaMenu" class="container-fluid m-0 p-0 fixed-top"> 
		<nav class="row justify-content-center navbar navbar-light navbar-expand-lg border-1">
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
                    <li class="nav-item mt-1 mr-lg-4 d-block d-lg-none d-xl-block">
                        <a href="D-SettingsPage.php" class="nav-link text-white" href="#">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav id="miniBar" class="col-12 navbar navbar-expand-lg d-none d-lg-block border-1 m-0 p-0">
            <div class="col-12 row justify-content-center">
				<div id="my-nav" class="row col-12 justify-content-center collapse navbar-collapse">
					<ul class="navbar-nav row justify-content-center">
						<li class="nav-item mr-0 mr-xl-2">
                            <div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Graphics & Design
                                    </button>
                                </a>
                            </div>
						</li>
						<li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Digital Marketing
                                    </button>
                                </a>
                            </div>
						</li>
						<li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Writing & Translation
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Video & Animation
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Studies
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Music & Audio
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Programming
                                    </button>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item mr-0 mr-xl-2">
							<div class="nav-link btn-group m-0 p-0">
                                <a href="D-ShopPage.php">
                                    <button type="button" class="btn bg-transparent rounded-0 text-white">
                                        Business
                                    </button>
                                </a>
                            </div>
                        </li>
					</ul>
                </div>
            </div>
		</nav>		
    </div>
    <div id="separator" class="bg-black col-12"></div>
    <div id="ideaSection" class="col-12 row m-0 p-0 justify-content-center">
        <div class="col-12 row justify-content-center justify-content-md-start bg-transparent">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="#" class="text-white h4">Ideas</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white h4">All</a></li>
                </ol>
            </div>
        </div>
        <style>
            .img-wrap{
                height: 300px;
            }
        </style>
        <div class="row col-12 m-0 p-0 mb-lg-2 justify-content-center">    
            <?php 
                $i=0;
                $result = mysqli_query($mysqli, "SELECT * FROM `idea_created`;");
                while ($res = mysqli_fetch_array($result)) {
                    $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `idea_extended` WHERE `idea_id` = ".$res["idea_id"]));
                    $result3 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `user_table` WHERE `user_id` = ".$res["user_id"]));
                    echo ('
                    <a href="D-IdeaPage.php?id='.$res["idea_id"].'" class="text-decoration-none col-10 col-md-6 col-lg-3 mt-2 row justify-content-center no-gutters">
                        <div class="ideaCard row col-12 my-2 ml-1 mt-lg-0 justify-content-center">
                            <div class="row col-12 col-sm-12 rounded border border-black p-0">
                                <div class="col-12 col-sm-6 col-lg-12 p-0 text-center img-wrap">
                                    <img src="..\to be use\lampcover1.png" alt="Card image" width="100%">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-12 p-3 bg-gray">
                                    <div class="row col-12 pb-2">
                                        <div class="col-12 text-left p-0">
                                            <span class="text-dark font-weight-bold">'.$res["title"].' '.$result3["l_name"].'</span>
                                        </div>
                                    </div>
                                    <div class="row col-12 pb-2">
                                        <p class="col-8 col-md-4 p-0 m-0">Author</p>
                                        <div class="col-3 col-md-3 float-right text-right">
                                            <span class="badge bg-secondary text-white py-2 px-3">'.$result3["f_name"].' '.$result3["l_name"].'</span>
                                        </div>
                                    </div>
                                    <div class="row col-12 pb-2">
                                        <p class="col-8 col-md-4 p-0 m-0">Photons</p>
                                        <div class="col-3 col-md-3 float-right text-right">
                                            <span class="badge bg-secondary text-white py-2 px-3">'.$res["photon"].'</span>
                                        </div>
                                    </div>
                                    <div class="row col-12 pb-2">
                                        <p class="col-8 col-md-4 p-0 m-0">Extensions</p>
                                        <div class="col-3 col-md-3 float-right text-right">
                                            <span class="badge bg-secondary text-white py-2 px-3">'.$result2['count'].'</span>
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
    <div id="lastSection" class="container-fluid no-gutters mt-6">
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
