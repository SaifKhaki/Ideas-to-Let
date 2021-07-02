<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
		$ideaID = $_GET['id'];
        $id = $_SESSION['user_id'];
        $stringArray = array();
        $i=0;
        $result = mysqli_query($mysqli, "SELECT `point_string` FROM `idea_desc` WHERE `idea_id` = '$ideaID'");
        while ($res = mysqli_fetch_array($result)) {
            $stringArray[$i] = $res['point_string'];
            $i++;
        }
        $userDP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['dp'];
        $user_id = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['user_id'];
        $ideaCP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['cp'];
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['f_name'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE `user_id` IN (SELECT `user_id` FROM `idea_created` WHERE `idea_id` = '$ideaID');"))['l_name'];
        $ideaTitle = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['title'];
        $ideaPhotons = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `idea_created` WHERE ( `idea_id` = '$ideaID')"))['photon'];
        if (isset($_POST['submit'])) {
            $ext_title = (isset($_POST['extTitle'])) ? mysqli_real_escape_string($mysqli, $_POST['extTitle']) : '';
            $ext_photon = (isset($_POST['photons'])) ? mysqli_real_escape_string($mysqli, $_POST['photons']) : '';
            $ext_jigsaw = (isset($_POST['jigsawIndex'])) ? mysqli_real_escape_string($mysqli, $_POST['jigsawIndex']) : '0';
			$ext_1 = (isset($_POST['ext1'])) ? mysqli_real_escape_string($mysqli, $_POST['ext1']) : '';
			$ext_2 = (isset($_POST['ext2'])) ? mysqli_real_escape_string($mysqli, $_POST['ext2']) : '';
			$ext_3 = (isset($_POST['ext3'])) ? mysqli_real_escape_string($mysqli, $_POST['ext3']) : '';
            $ext_4 = (isset($_POST['ext4'])) ? mysqli_real_escape_string($mysqli, $_POST['ext4']) : '';
            $ext_5 = (isset($_POST['ext5'])) ? mysqli_real_escape_string($mysqli, $_POST['ext5']) : '';
            $ext_6 = (isset($_POST['ext6'])) ? mysqli_real_escape_string($mysqli, $_POST['ext6']) : '';
			
            $result1 = mysqli_query($mysqli, "INSERT INTO `idea_extended`(`user_id`,`idea_id`,`title`,`photon`) VALUES('$id','$ideaID','$ext_title','$ext_photon')");
            $ext_id = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `ext_idea_id` FROM `idea_extended` WHERE ( `title` = '$ext_title')"))['ext_idea_id'];
            
            $result2 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','1','$ext_1')");
            $result3 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','2','$ext_2')");
            $result4 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','3','$ext_3')");
            $result5 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','4','$ext_4')");
            $result6 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','5','$ext_5')");
            $result7 = mysqli_query($mysqli, "INSERT INTO `idea_extended_desc`(`point_id`,`ext_idea_id`,`ext_point_id`,`point_string`) VALUES('$ext_jigsaw','$ext_id','6','$ext_6')");
			header("Location: D-DashboardPage.php");
        }
    }else{
        header("Location: S-SigninPage.php");
    }
	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Extend Idea</title>
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
    <!-- js for auto height increase of text area -->
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php echo trim($stringArray[0])!=""?"$('#jigsawPoints .jigsaw').eq(0).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(0).addClass('d-none');" ?>
            <?php echo trim($stringArray[1])!=""?"$('#jigsawPoints .jigsaw').eq(1).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(1).addClass('d-none');" ?>
            <?php echo trim($stringArray[2])!=""?"$('#jigsawPoints .jigsaw').eq(2).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(2).addClass('d-none');" ?>
            <?php echo trim($stringArray[3])!=""?"$('#jigsawPoints .jigsaw').eq(3).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(3).addClass('d-none');" ?>
            <?php echo trim($stringArray[4])!=""?"$('#jigsawPoints .jigsaw').eq(4).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(4).addClass('d-none');" ?>
            <?php echo trim($stringArray[5])!=""?"$('#jigsawPoints .jigsaw').eq(5).removeClass('d-none');":"$('#jigsawPoints .jigsaw').eq(5).addClass('d-none');" ?>
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
                        <a class="nav-link text-white" href="S-StrategiesPage.html" tabindex="-1" aria-disabled="true">Startegies</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  
    <div id="coverPhotoSection" class="img-wrap cover-height container-fluid m-0 p-0 mt-5 pt-4 mt-lg-0 pt-lg-0">
        <img src="<?php echo trim($ideaCP)!=""?$ideaCp:"../to be use/handPaper cover photo.png";?>" alt="bulb" class="img-fluid">
    </div>
    
    <div id="descriptionSection" class="row px-5 mb-5 position-relative justify-content-center">
        <div class="row col-12 m-0 mx-5 pt-0 pt-sm-3 pt-md-5 pt-lg-4 pb-3 justify-content-center rounded">
            <div class="col-5 col-sm-4 col-md-3 col-lg-2 p-4 mb-4 mt-n5 text-center position-absolute">
                <!-- dynamic image -->
                <img src="<?php echo trim($userDP)!=""?$userDP:"../to be use/man.png";?>" alt="avatar" class="rounded-circle border border-black" width="100%">
            </div>
            <div class="row col-12 mt-3 text-center justify-content-center">
                <div class="col-lg-4">
                <a href="D-SellerPage.php?id=<?php echo $user_id; ?>" id="name" class="h1 m-0 pl-0 mt-2"><?php echo $fname; echo " "; echo $lname;?></a>
                    <p>Computer Scientist</p>
                </div>
            </div>
            <form method="POST">
                <div class="row col-12 mt-2 mt-lg-0">
                    <div class="row col-12">
                        <h5 class="col-5 col-md-3 p-0 m-0 mr-2">Idea</h5>
                        <div class="col-6 col-md-8 p-0 m-0 "><?php echo $ideaTitle; ?></div>
                    </div>
                    <div class="row col-12 mt-3">
                        <h5 class="col-5 col-md-3 p-0 m-0 mr-2">Idea ID</h5>
                        <div id="ideaID" class="col-6 col-md-8 p-0 m-0"><?php echo $ideaID; ?> 
                            <button class="btn btn-outline-secondary m-0 p-0 px-1">
                                <img src="https://img.icons8.com/material-rounded/24/000000/copy.png"/>
                            </button>
                        </div>
                    </div>
                    <div class="row col-12 mt-3">
                        <h5 class="col-5 col-md-3 p-0 m-0 mr-2">Photons of the idea</h5>
                        <div class="row col-6 col-md-9">
                            <div class="d-block d-md-none col-6 col-md-9 p-0 m-0"><?php echo $ideaPhotons;?></div>
                            <div class="d-none d-md-block progress col-12 p-0 mt-1">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $ideaPhotons;?>%" aria-valuenow="<?php echo $ideaPhotons;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $ideaPhotons;?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row m-0 p-0 mt-3">
                        <h5 class="col-5 col-md-3 p-0 m-0 mr-2" for="inputSuccess">Extension Title</h5>
                        <div class="row col-6 col-md-9">
                            <input type="text" name="extTitle" class="form-control m-0" placeholder="I have an idea of">
                        </div>
                    </div>
                    <div class="col-12 row form-group m-0 p-0 mt-3">
                        <h5 class="col-8 col-sm-9 col-md-3 col-lg-2 order-1 control-label align-self-center" for="inputSuccess">Spend Photons</h5>
                        <div class="mt-4 mt-md-0 col-12 col-md-6 col-lg-9 order-3 order-md-2 pr-0 pr-md-2 align-self-center">
                            <input name="photons" type="range" class="form-control-range" id="formControlRange">
                        </div>
                        <button class="col-4 col-sm-3 col-lg-1 order-2 order-md-3 btn bg-scheme2 btn-outline-secondary align-self-center rounded text-center">Manage</button>
                    </div>
                    <div id="modes" class="row col-12 m-0 mt-3 bg-white p-3 pr-0 mr-0">
                        <div class="row col-12 m-0 p-0 text-center text-md-left justify-content-center">
                            <h3 id="check" class="col-12 col-md-6 p-0 m-0 align-self-center">Description</h3>
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
                    </div>
                    <ul id="descriptionMode" class="row col-12 d-none ml-2">
                        <li class="col-sm-12 align-self-center">
                            <p></p>
                        </li>
                        <li class="col-sm-12 align-self-center d-none">
                            <p></p>
                        </li>
                        <li class="col-sm-12 align-self-center d-none">
                            <p></p>
                        </li>
                        <li class="col-sm-12 align-self-center d-none">
                            <p></p>
                        </li>
                        <li class="col-sm-12 align-self-center d-none">
                            <p></p>
                        </li>
                        <li class=" col-sm-12 align-self-center d-none">
                            <p></p>
                        </li>
                    </ul>
                    <div id="jigsawMode" class="d-none">
                        <div class="col-12">
                            <div class="jigsaw mt-1">
                                <span class="t"></span>
                                <span class="b"></span>
                                <textarea type='text' name='ext1' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='ext2' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='ext3' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='ext4' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='ext5' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='ext6' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 m-0 p-0 mt-3 justify-content-center">
                        <input type="number" name="jigsawIndex" id="jigsawIndex" class="d-none">
                        <input type="submit" name="submit" value="Extend Idea" class="col-9 col-md-3 mt-2 mt-md-0 btn btn-outline-secondary btn-sm px-5 mx-3">
                    </div>
                </div>
            </form>
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
