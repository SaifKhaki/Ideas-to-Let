<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $defaultCP = "../to be use/handPaper cover photo.png";
        $ideaID = $_GET['id'];
        $extID = $_GET['exID'];
        $id = $_SESSION['user_id'];
        $pointID = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_extended_desc` WHERE ( `ext_idea_id` = '$extID')"))['point_id'];
        $stringArray = array();
        $i=0;
        $result = mysqli_query($mysqli, "SELECT `point_string` FROM `idea_desc` WHERE `idea_id` = '$ideaID'");
        while ($res = mysqli_fetch_array($result)) {
            $stringArray[$i] = $res['point_string'];
            $i++;
        }
        
        $extArray = array();
        $j=0;
        $result2 = mysqli_query($mysqli, "SELECT `point_string` FROM `idea_extended_desc` WHERE `ext_idea_id` = '$extID'");
        while ($res2 = mysqli_fetch_array($result2)) {
            $extArray[$j] = $res2['point_string'];
            $j++;
        }
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['f_name'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['l_name'];
        $userDP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['dp'];

        $ideaCP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['cp'];
        $ideaTitle = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['title'];
        $ideaPhotons = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['photon'];

        $extTitle = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_extended` WHERE ( `ext_idea_id` = '$extID')"))['title'];
        $extPhotons = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_extended` WHERE ( `ext_idea_id` = '$extID')"))['photon'];

        if (isset($_POST['accept'])) {
            $result3 = mysqli_query($mysqli, "UPDATE `idea_extended` SET `status_`= '1' WHERE `ext_idea_id`='$extID';");
            header("Location: D-ShopPage.php");
        }
        if (isset($_POST['reject'])) {
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
	<title>Extension Proposal</title>
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="..\Css\common.css">
	<link rel="stylesheet" type="text/css" href="..\Css\Jigsaw.css">
	<link rel="stylesheet" type="text/css" href="..\Css\D-IdeaPage.css">
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
	<script type="text/javascript" src="..\js\jigsaw.js"></script>
    <script type="text/javascript" src="..\js\common.js"></script>
    <script>
        $(document).ready(function () {
            <?php echo trim($stringArray[0])!=""?"$('#jigsawPoints .jigsaw').eq(0).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(0).addClass('d-none');" ?>
            <?php echo trim($stringArray[1])!=""?"$('#jigsawPoints .jigsaw').eq(1).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(1).addClass('d-none');" ?>
            <?php echo trim($stringArray[2])!=""?"$('#jigsawPoints .jigsaw').eq(2).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(2).addClass('d-none');" ?>
            <?php echo trim($stringArray[3])!=""?"$('#jigsawPoints .jigsaw').eq(3).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(3).addClass('d-none');" ?>
            <?php echo trim($stringArray[4])!=""?"$('#jigsawPoints .jigsaw').eq(4).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(4).addClass('d-none');" ?>
            <?php echo trim($stringArray[5])!=""?"$('#jigsawPoints .jigsaw').eq(5).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(5).addClass('d-none');" ?>

            <?php echo (isset($extArray[0]) && trim($extArray[0])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(0).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(0).addClass('d-none');" ?>
            <?php echo (isset($extArray[1]) && trim($extArray[1])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(1).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(1).addClass('d-none');" ?>
            <?php echo (isset($extArray[2]) && trim($extArray[2])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(2).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(2).addClass('d-none');" ?>
            <?php echo (isset($extArray[3]) && trim($extArray[3])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(3).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(3).addClass('d-none');" ?>
            <?php echo (isset($extArray[4]) && trim($extArray[4])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(4).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(4).addClass('d-none');" ?>
            <?php echo (isset($extArray[5]) && trim($extArray[5])!="")?"$('#notExtendedPoints_jigsaw .jigsaw').eq(5).removeClass('d-none');":"$('#notExtendedPoints_jigsaw .jigsaw').eq(5).addClass('d-none');" ?>
            
            $("#notExtendedPoints_jigsaw").removeClass("d-none");
            $("#notExtendedPoints_jigsaw").detach().insertAfter($("#jigsawPoints .jigsaw").eq(<?php echo ($pointID);?>));
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
                        <a class="nav-link text-white" href="D-DashboardPage.php" tabindex="-1" aria-disabled="true">Dashboard</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-SettingsPage.php">Settings</a>
					</li>
					<li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="S-StrategiesPage.html" tabindex="-1" aria-disabled="true">Strategies</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  
    <div id="coverPhotoSection" class="img-wrap cover-height container-fluid m-0 p-0 mt-5 pt-4 mt-lg-0 pt-lg-0">
        <img src="<?php echo (isset($ideaCP) && trim($ideaCP)!="")?$ideaCp:"../to be use/handPaper cover photo.png";?>" alt="bulb" class="img-fluid">
    </div>
    <div id="descriptionSection" class="row px-5 mb-5 position-relative justify-content-center">
        <div class="row col-12 m-0 mx-5 pt-0 pt-sm-3 pt-md-5 pt-lg-4 pb-3 justify-content-center rounded">
            <div class="col-5 col-sm-4 col-md-3 col-lg-2 p-4 mb-4 mt-n5 text-center position-absolute">
                <!-- dynamic image -->
                <img src="<?php echo trim($userDP)!=""?$userDP:"../to be use/man.png";?>" alt="avatar" class="rounded-circle border border-black" width="100%">
            </div>
            <div class="row col-12 mt-3 text-center justify-content-center">
                <div class="col-lg-4">
                    <p id="name" class="h1 m-0 pl-0 mt-2"><?php echo $fname; echo " "; echo $lname;?></p>
                    <p>Computer Scientist</p>
                </div>
            </div>
			<div class="row col-12 mt-2 mt-lg-0">
				<div class="row col-12">
					<h5 class="col-6 col-md-3 p-0 m-0">Idea</h5>
					<div class="col-6 col-md-9 p-0 m-0 "><?php echo $ideaTitle; ?></div>
				</div>
				<div class="row col-12 mt-3">
					<h5 class="col-6 col-md-3 p-0 m-0">Idea ID</h5>
					<div id="ideaID" class="col-6 col-md-9 p-0 m-0"><?php echo $ideaID;?>
						<button class="btn btn-outline-secondary m-0 p-0 px-1">
							<img src="https://img.icons8.com/material-rounded/24/000000/copy.png"/>
						</button>
					</div>
				</div>
				<div class="row col-12 mt-3">
					<h5 class="col-6 col-md-3 p-0 m-0">Created By</h5>
					<div class="col-6 col-md-9 p-0 m-0">Self created</div>
                </div>
                <div class="row col-12 mt-3">
					<h5 class="col-6 col-md-3 p-0 m-0">Extension Title</h5>
					<div class="col-6 col-md-9 p-0 m-0"><?php echo $extTitle; ?></div>
				</div>
				<div id="modes" class="row col-12 m-0 mt-3 p-3 bg-white">
					<div class="row col-12 m-0 p-0 text-center text-md-left justify-content-center">
						<h3 class="col-12 col-md-6 p-0 m-0 align-self-center">Request Description</h3>
						<div class="col-12 col-md-6 text-md-right p-0 m-0 mt-xs-2 mt-md-2">
							<div id="modeButton" class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="px-3 btn border border-secondary shadow-none btn-sm bg-scheme2 active">Jigsaw Mode</button>
								<button type="button" class="px-3 btn border border-secondary btn-sm shadow-none">Description Mode</button>
							</div>
						</div>
					</div>
					<div id="descriptionPoints" class="row col-12 m-0 p-0 pt-5 pl-lg-5 d-none">
						<div class="col-12">
							<ul>
								<li class="col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[0];?></p>
                                </li>
                                <ul id="notExtendedPoints_description">
                                    <li class="col-sm-12 align-self-center">
                                        <p>Extension</p>
                                    </li>
                                    <li class="col-sm-12 align-self-center">
                                        <p>Extension</p>
                                    </li>
                                    <li class="col-sm-12 align-self-center">
                                        <p>Extension</p>
                                    </li>
                                </ul>
								<li class="col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[1];?></p>
                                </li>
                                <li class="col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[2];?></p>
                                </li>
                                <li class="col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[3];?></p>
                                </li>
                                <li class="col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[4];?></p>
                                </li>
                                <li class=" col-sm-12 align-self-center">
                                    <p><?php echo $stringArray[5];?></p>
                                </li>
							</ul>
						</div>
                    </div>
                    <div id="jigsawPoints" class="row col-12 p-4 p-0 m-0 justify-content-start">
                        <div class="col-12 flex-column d-inline-flex">
                            <div class="jigsaw mt-1 d-none">
                                <span class="b"></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[0];?></p>
                            </div>
                            <div class="jigsaw mt-1 d-none">
								<span class="t"></span>
								<span class="b"></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[1];?></p>
                            </div>
                            <div class="jigsaw mt-1 d-none">
								<span class="t"></span>
								<span class="b"></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[2];?></p>
                            </div>
                            <div class="jigsaw mt-1 d-none">
								<span class="t"></span>
								<span class="b"></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[3];?></p>
                            </div>
                            <div class="jigsaw mt-1 d-none">
								<span class="t"></span>
								<span class="b"></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[4];?></p>
                            </div>
                            <div class="jigsaw mt-1 d-none">
								<span class="t"></span>
								<span></span>
                                <p class="jigsaw-text ml-3"><?php echo $stringArray[5];?></p>
                            </div>
                        </div>
					</div>
                    <div id="notExtendedPoints_jigsaw" class="d-none">
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[0];?></p>
                        </div>
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[1];?></p>
                        </div>
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[2];?></p>
                        </div>
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[3];?></p>
                        </div>
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[4];?></p>
                        </div>
                        <div class="jigsaw mt-1 bg-scheme d-none">
                            <span class="t"></span>
                            <span class="b"></span>
                            <p class="jigsaw-text ml-3"><?php echo $extArray[5];?></p>
                        </div>
                    </div>
                </div>
				<form method="POST" class="row col-12 m-0 p-0 mt-3 justify-content-center">
                    <div class="row col-12 justify-content-center">
                        <input type="submit" name="accept" value="Extend Your IDEA" class="col-9 col-md-3 mt-2 mt-md-0 btn btn-outline-secondary btn-sm px-5 mx-3">
                        <input type="submit" name="reject" value="Reject Request" class="col-9 col-md-3 mt-2 mt-md-0 btn btn-outline-secondary btn-sm px-5 mx-3">
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
