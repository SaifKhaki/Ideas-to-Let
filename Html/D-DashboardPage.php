<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = '10';
        $c_photo = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `user_id` = '$id')"))['dp'];
        $d_photo = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `user_id` = '$id')"))['cp'];
        $ext_requests = mysqli_query($mysqli,"SELECT * FROM `idea_extended` WHERE `status_` = '0' AND `idea_id` IN( SELECT `idea_id` FROM `idea_created` WHERE `user_id` = '$id')");
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `f_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['f_name'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `l_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['l_name'];

    }else{
        header("Location: S-SigninPage.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--External CSS-->
    <link rel="stylesheet" type="text/css" href="..\Css\common.css">
    <link rel="stylesheet" type="text/css" href="..\Css\D-DashboardPage.css">
    <!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
    <script type="text/javascript" src="..\js\common.js"></script>
    <style>
        #leftMenu{
            top: 70px;
        }
        .h-90{
            height: 94%;
        }
    </style>
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
                        <a class="nav-link text-white" href="D-SettingsPage.php" tabindex="-1" aria-disabled="true">Settings</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-StrategiesPage.html" tabindex="-1" aria-disabled="true">Startegies</a>
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
    <div id="coverPhotoSection" class="img-wrap cover-height container-fluid m-0 p-0 mt-5 pt-4 mt-lg-0 pt-lg-0">
        <img src="<?php echo($c_photo);?>" alt="bulb" class="img-fluid">
    </div>
    <div id="descriptionSection" class="container-fluid">
        <div class="row justify-content-center p-5 m-0 no-gutters">
            <div class="leftDiv row d-none d-lg-block col-lg-4 mr-3 pt-3">
                <div class="row col-lg-12 justify-content-center py-3 rounded h-100">
                    <div class="row col-12 justify-content-center">
                        <div class="col-lg-6 text-center  mb-4 img-wrap dp-height">
                            <!-- dynamic image -->
                            <img src="<?php echo($d_photo);?>" alt="avatar" class="rounded-circle border border-black img-fluid" width="100%">
                        </div>
                        <div class="col-lg-12 text-center">
                            <p id="name"><?php echo $fname; echo " "; echo $lname;?></p>
                        </div>
                        <div class="col-lg-10 line my-3"></div>
                    </div>
                    <div class="me row col-6 col-lg-12 no-gutters p-2 d-none d-lg-block h-90">
                        <div id="leftMenu" class="row col-12 position-sticky">
                            <div class="row col-12 text-center justify-content-center no-gutters">
                                <a href="#notification" class="btn col-12 p-1 m-0 mb-4 bg-scheme text-center rounded">
                                    <h5>Notifications</h5>
                                </a>
                                <a href="#lumina" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Lumina</h5>
                                </a>
                                <a href="#ideaCreated" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Ideas Created</h5>
                                </a>
                                <a href="#ideaPurchased" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Ideas Purchased</h5>
                                </a>
                                <a href="#ideaExtended" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Ideas Extended</h5>
                                </a>
                                <a href="#problemCreated" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Problems Created</h5>
                                </a>
                                <a href="#problemSolved" class="btn bg-transparent col-12 p-1 m-0 mb-4 text-center rounded">
                                    <h5>Problems Solved</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightDiv row justify-content-center col-xs-12 col-lg-8 p-0 pt-3 ">
                <div id="notification" class="row col-12 no-gutters my-3 py-2 pt-md-0 mt-md-0">
                    <div class="row justify-content-center col-12 no-gutters">
                        <div class="row col-12 col-lg-10 justify-content-center">
                            <div class="col-12 mb-4 text-center text-lg-left">
                                <h3 class="">Winner of the Week</h3>
                            </div>
                            <div class="row col-12 justify-content-center rounded">
                                <!-- dynamic image and author name -->
                                <div class="col-12 col-sm-4 p-0">
                                    <img src="..\to be use\logo.png" alt="Card image" width="100%" height="90%" class="img-fluid">
                                </div>
                                <div class="col-12 col-sm-8 px-0 pr-sm-5 pl-sm-2 mt-3 mt-sm-0">
                                    <h4 class="card-title resp">An idea to create an AMAZON of ideas</h4>
                                    <p class="card-text "><kbd class="bg-secondary d-none d-md-inline">author</kbd> Saif Ullah Bin Khaki</p>
                                    <a href="#" class=" btn btn-sm col-12 col-lg-9 btn-block btn-outline-secondary">See Idea</a>
                                </div>
                            </div>
                        </div>
                        <div id="youtubeLogo" class="col-6 col-sm-3 col-lg-2 my-auto order-first order-lg-last">
                            <!-- you tube logo -->
                            <img src="..\to be use\you tube logo.png" alt="Youtube logo" width="100%" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row col-12 no-gutters my-3 py-2 pt-md-0 mt-md-0">
                    <div class="row col-12 no-gutters">
                        <div class="row col-12 col-lg-12 justify-content-center">
                            <div class="col-12 mt-4 text-center text-lg-left">
                                <h2 class="">Notifications</h2>
                            </div>
                            <div class="row justify-content-center no-gutters col-12 rounded ml-3">
                                <!-- dynamic image and author name -->
                                <?php
                                    while($res = mysqli_fetch_array($ext_requests)){
                                        $ext_name = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `user_id` = '".$res['user_id']."')"));
                                        $idea_name = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '".$res['idea_id']."')"));
                                        echo '<div class="col-12 my-badge py-2 px-3 pl-1 bg-secondary mb-2 text-white">
                                                <a href="D-AddExtensionPage.php?id='.$res['idea_id'].'&exID='.$res['ext_idea_id'].'" class="m-0 p-0 resp text-decoration-none text-white">
                                                <span class="text-scheme font-weight-bold">'.$ext_name['f_name'].' '.$ext_name['l_name'].'</span> uploaded a request to extend your idea of <span class="text-scheme font-weight-bold">'.$idea_name['title'].'</span>.
                                                </a>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="lumina" class="row col-12 my-3 mt-md-0 p-4">
                    <div class="row col-12 no-gutters justify-content-center">
                        <div class="row col-12 col-lg-10 justify-content-center">
                            <div class="col-12 mb-4 text-center text-lg-left">
                                <h3 class="">Lumina Updates</h3>
                            </div>
                            <div class="row no-gutters col-12 rounded ml-0 ml-md-3">
                                <div class="col-11 px-0 px-md-5 mb-4">
                                    <div class="col-10 float-left">Photons Earned<small>(total)</small></div>
                                    <div class="col-1 float-right text-right">
                                        <span class="py-2 px-3">30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 my-auto d-none d-lg-block">
                            <img src="..\to be use\fire2.png" alt="firelogo" width="100%" class="img-fluid">
                        </div>
                        <div class="col-10 line my-3"></div>
                        <div class="row col-12 justify-content-center">
                            <div class="row col-12 justify-content-center mb-5">
                                <!-- dynamic image and author name -->
                                <div class="col-6 col-sm-3 col-md-1 p-0">
                                    <img src="..\to be use\fire2.png" alt="Card image" width="100%" height="90%" class="img-fluid">
                                </div>
                                <div class="col-10 pt-3 text-center text-md-left">
                                    <h4 class="card-title">Fire</h4>
                                    <p class="card-text">Rewarded to creative ideas better than the average ones.</p>
                                </div>
                            </div>
                            <div class="row col-12 justify-content-center mb-5">
                                <!-- dynamic image and author name -->
                                <div class="col-6 col-sm-3 col-md-1 p-0">
                                    <img src="..\to be use\lamp.png" alt="Card image" width="100%" height="90%" class="img-fluid">
                                </div>
                                <div class="col-10 pt-3 text-center text-md-left">
                                    <h4 class="card-title">Lamp</h4>
                                    <p class="card-text">Rewarded to the ideas with better strategy of photons.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ideaCreated" class="row col-12 px-3 justify-content-center">
                    <div class="col-12 row p-3 mb-2">
                        <div class="col-12 mb-2 text-center text-md-left">
                            <h4>Ideas Created</h4>
                        </div>
                        <?php 
                            $i=0;
                            $result = mysqli_query($mysqli, "SELECT * FROM `idea_created` WHERE `user_id` = '$id'");
                            while ($res = mysqli_fetch_array($result)) {
                                
                                $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `idea_extended` WHERE `idea_id` = ".$res["idea_id"]));
                                echo ('
                                <a href="D-IdeaPage.php?id='.$res["idea_id"].'" class="text-decoration-none col-12 mt-2 row justify-content-center">
                                    <div class="row col-12 col-sm-9 col-md-12 rounded mb-2 ml-3 border border-black bg-gray p-0">
                                        <div class="col-12 col-md-3 m-0 p-0 my-auto">
                                            <img src="..\to be use\logo.png" alt="Card image" width="100%" class="img-fluid">
                                        </div>
                                        <div class="col-12 col-md-9 pt-3 pr-5 ">
                                            <h4 class="card-title">'.$res["title"].'</h4>
                                            <div class="row col-12">
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Photons</p>
                                                    <div class="col-3 col-md-3 float-right text-right">
                                                        <span class="badge bg-secondary text-white py-2 px-3">'.$res["photon"].'</span>
                                                    </div>
                                                </div>
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Extensions</p>
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
                    <div id="ideaPurchased" class="col-12 row p-3 mb-2">
                        <div class="col-12 mb-2 text-center text-md-left">
                            <h4>Ideas Purchased</h4>
                        </div>
                        <?php 
                            $i=0;
                            $result = mysqli_query($mysqli, "SELECT * FROM `idea_created` WHERE `idea_id` IN ( SELECT `idea_id` FROM `ideas_purchased` WHERE `user_id` = '$id' );");
                            while ($res = mysqli_fetch_array($result)) {
                                $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `idea_extended` WHERE `idea_id` = ".$res["idea_id"]));
                                echo ('
                                <a href="D-IdeaPage.php?id='.$res["idea_id"].'" class="text-decoration-none col-12 mt-2 row justify-content-center">
                                    <div class="row col-12 col-sm-9 col-md-12 rounded mb-2 ml-3 border border-black bg-gray p-0">
                                        <div class="col-12 col-md-3 m-0 p-0 my-auto">
                                            <img src="..\to be use\logo.png" alt="Card image" width="100%" class="img-fluid">
                                        </div>
                                        <div class="col-12 col-md-9 pt-3 pr-5 ">
                                            <h4 class="card-title">'.$res["title"].'</h4>
                                            <div class="row col-12">
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Photons</p>
                                                    <div class="col-3 col-md-3 float-right text-right">
                                                        <span class="badge bg-secondary text-white py-2 px-3">'.$res["photon"].'</span>
                                                    </div>
                                                </div>
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Extensions</p>
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
                    <div id="ideaExtended" class="col-12 row p-3 mb-2">
                        <div class="col-12 mb-2">
                            <h4>Ideas Extended</h4>
                        </div>
                        <?php 
                            $i=0;
                            $result = mysqli_query($mysqli, "SELECT * FROM `idea_created` WHERE `idea_id` IN (SELECT idea_id FROM `idea_extended` WHERE `user_id` = '$id');");
                            while ($res = mysqli_fetch_array($result)) {
                                $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `idea_extended` WHERE `idea_id` = ".$res["idea_id"]));
                                echo ('
                                <a href="D-IdeaPage.php?id='.$res["idea_id"].'" class="text-decoration-none col-12 mt-2 row justify-content-center">
                                    <div class="row col-12 col-sm-9 col-md-12 rounded mb-2 ml-3 border border-black bg-gray p-0">
                                        <div class="col-12 col-md-3 m-0 p-0 my-auto">
                                            <img src="..\to be use\logo.png" alt="Card image" width="100%" class="img-fluid">
                                        </div>
                                        <div class="col-12 col-md-9 pt-3 pr-5 ">
                                            <h4 class="card-title">'.$res["title"].'</h4>
                                            <div class="row col-12">
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Photons</p>
                                                    <div class="col-3 col-md-3 float-right text-right">
                                                        <span class="badge bg-secondary text-white py-2 px-3">'.$res["photon"].'</span>
                                                    </div>
                                                </div>
                                                <div class="row col-12 pb-2">
                                                    <p class="col-8 col-md-4 p-0 m-0">Extensions</p>
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
                    <div id="problemCreated" class="col-12 row p-3 mb-2">
                        <div class="col-12 mb-2">
                            <h4>Problems Created</h4>
                        </div>
                        <?php 
                            $i=0;
                            $result = mysqli_query($mysqli, "SELECT * FROM `problem_posted` WHERE `user_id` = '$id';");
                            while ($res = mysqli_fetch_array($result)) {
                                $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `problem_extended` WHERE `prob_id` = ".$res["prob_id"]));
                                echo ('
                                <a href="D-ProblemPage.php?id='.$res["prob_id"].'" class="text-decoration-none col-12 mt-2 row justify-content-center">
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
                    <div id="problemSolved" class="col-12 row p-3 mb-2">
                        <div class="col-12 mb-2">
                            <h4>Problems Solved</h4>
                        </div>
                        <?php 
                            $i=0;
                            $result = mysqli_query($mysqli, "SELECT * FROM `problem_posted` WHERE `prob_id` IN (SELECT `prob_id` FROM `problem_extended` WHERE `user_id` = '$id');");
                            while ($res = mysqli_fetch_array($result)) {
                                $result2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS `count` FROM `problem_extended` WHERE `prob_id` = ".$res["prob_id"]));
                                echo ('
                                <a href="D-ProblemPage.php?id='.$res["prob_id"].'" class="text-decoration-none col-12 mt-2 row justify-content-center">
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
            </div>
        </div>
    </div>
    <div id="lastSection" class="container-fluid no-gutters w-100">
        <div class="row">
            <div class="col-xs-12 col-lg-7">
                <div class="col-12 pt-5">
                    <div class="text-center mt-5">
                        <h1>Get Sponsors from <br>YOUTUBE</h1>
                        <p class="mt-3 text-secondary">
                            Best idea submitted in every week will be uploaded on our YouTube channel which will help the seller to grow their idea and reach out to a bigger community.
                        </p>
                        <a href="D-YoutubePage.php">
							<button class="btn btn-outline-secondary px-5 py-2" type="button">Upload  Your Idea</button>
						</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-5 text-center" style="height: 100%;">
                <img src="..\To be use\Youtube phone.png" alt="phone" height="100%">
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
