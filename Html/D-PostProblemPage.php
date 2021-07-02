<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `f_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['f_name'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `l_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['l_name'];
        $userDP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `user_id` = '$id')"))['dp'];
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($mysqli, $_POST['title']);
            $point1 = mysqli_real_escape_string($mysqli, $_POST['point1']);
            $point2 = mysqli_real_escape_string($mysqli, $_POST['point2']);
            $point3 = mysqli_real_escape_string($mysqli, $_POST['point3']);
            $point4 = mysqli_real_escape_string($mysqli, $_POST['point4']);
            $point5 = mysqli_real_escape_string($mysqli, $_POST['point5']);
            $point6 = mysqli_real_escape_string($mysqli, $_POST['point6']);
            $stackLink = mysqli_real_escape_string($mysqli, $_POST['stack_link']);
            $gitLink = mysqli_real_escape_string($mysqli, $_POST['git_link']);
            $titleErr = false;
            $pointErr = false;
            if(trim($title)!=''){
                $result1 = mysqli_query($mysqli, "INSERT INTO `problem_posted`(`title`,`user_id`) VALUES('$title','$id')");
                $probID = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `prob_id` FROM `problem_posted` WHERE ( `title` = '$title')"))['prob_id'];
                $result2 = mysqli_query($mysqli, "INSERT INTO `problem_links`(`prob_id`,`overflow`,`git`) VALUES('$probID','$stackLink','$gitLink')");
                echo "<script type='text/javascript'>alert('$id');</script>";
                if (trim($point1)!=''){
                    $result2 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','1','$point1')");
                    $result3 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','2','$point2')");
                    $result4 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','3','$point3')");
                    $result5 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','4','$point4')");
                    $result6 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','5','$point5')");
                    $result7 = mysqli_query($mysqli, "INSERT INTO `problem_desc`(`prob_id`,`prob_point_id`,`point_string`) VALUES('$probID','6','$point6')");
                    header("Location: D-ShopPage.php");
                }else{
                    $pointErr = true;
                }
            }else{
                $titleErr = true;
            }

        }
    }else{
        header("Location: S-SigninPage.php");
    }
	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Post Problem</title>
    <!--External CSS-->
    <link rel="stylesheet" type="text/css" href="..\Css\common.css">
    <link rel="stylesheet" type="text/css" href="..\Css\Jigsaw.css">
	<link rel="stylesheet" type="text/css" href="..\Css\D-PostPage.css">
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
			$titleErr = "<?php echo $titleErr;?>";
			if ($titleErr) {
				$("#titleErr").removeClass('d-none');
			}
            $pointErr = "<?php echo $pointErr;?>";
			if ($pointErr) {
				$("#pointErr").removeClass('d-none');
			}
		});
	</script>
</head>
<body class="m-0 p-0 pt-5">
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
                        <a class="nav-link text-white" href="S-ContactPage.html" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-ShopPage.php" tabindex="-1" aria-disabled="true">Shop Ideas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div id="descriptionSection" class="mt-6 row position-relative p-5 mb-5 justify-content-center no-gutters">
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
			<form method="POST" class="row col-12 form-horizontal">
                <div class="col-12 row form-group m-0 p-0">
                    <h5 class="col-12 col-md-3 col-lg-2 control-label align-self-center" for="inputSuccess">Problem Title</h5>
                    <div class="col-12 col-md-9 col-lg-10 align-self-center">
                        <input type="text" name="title" class="form-control" id="inputSuccess" placeholder="I have a problem of" value="">
                        <label id="titleErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*add title.</label>
                    </div>
                </div>
                <div id="socialAccounts" class="col-lg-12 row form-group m-0 mt-3 bg-white p-3">
                    <h3 class="col-12 control-label align-self-center" for="inputSuccess">Link Pages</h3>
                    <div class="col-12 row mt-3 text-center text-md-left justify-content-center justify-content-md-start">
                        <h5 class="col-12 col-md-4 col-lg-2 mt-3 order-2 order-md-1 control-label align-self-center" for="inputSuccess">Stack Overflow</h5>
                        <div class="row col-6 col-md-2 col-lg-1 ml-0 pl-0 order-1 order-md-2 text-center text-md-left align-self-center justify-content-center">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"viewBox="0 0 172 172"style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="#ff9800"></path><g fill="#000000"><path d="M101.01641,29.34414l-6.9875,4.8375l24.05312,35.34062l6.9875,-4.8375zM82.87578,45.20039l-5.64375,6.45l32.25,27.95l5.64375,-6.45zM69.97578,64.01289l-3.89688,7.65937l38.02812,19.35l3.89688,-7.65938zM62.58516,83.49727l-1.88125,8.33125l41.52187,9.80938l1.88125,-8.33125zM42.56328,94.51602v47.3h77.4v-47.3h-8.6v38.7h-60.2v-38.7zM60.16641,101.77227l-0.5375,8.6l42.59688,2.41875l0.5375,-8.6zM59.76328,116.01602v8.6h42.73125v-8.6z"></path></g><path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="none"></path><path d="M86,168.56c-45.59663,0 -82.56,-36.96337 -82.56,-82.56v0c0,-45.59663 36.96337,-82.56 82.56,-82.56v0c45.59663,0 82.56,36.96337 82.56,82.56v0c0,45.59663 -36.96337,82.56 -82.56,82.56z" fill="none"></path></g></svg>
                                </a>
                        </div>
                        <div class="row col-auto col-lg-8 order-3 text-center text-md-left align-self-center">
                            <input name="stack_link" type="text" class="form-control" id="inputSuccess" placeholder="Paste Facebook link here" value="">
                        </div>
                    </div>
                    <div class="col-12 row mt-3 text-center text-md-left justify-content-center justify-content-md-start">
                        <h5 class="col-12 col-md-4 col-lg-2 mt-3 order-2 order-md-1 control-label align-self-center" for="inputSuccess">Git Hub</h5>
                        <div class="row col-6 col-md-2 col-lg-1 ml-0 pl-0 order-1 order-md-2 text-center text-md-left align-self-center justify-content-center">
                            <a href="">
                                <img src="https://img.icons8.com/ios-filled/50/000000/github.png" width="100%" />
                            </a>
                        </div>
                        <div class="row col-auto col-lg-8 order-3 text-center text-md-left align-self-center">
                            <input name="git_link" type="text" class="form-control" id="inputSuccess" placeholder="Paste Facebook link here" value="">
                        </div>
                    </div>
                </div>
                <div id="modes" class="row col-12 m-0 mt-3 bg-white p-3 pr-0 mr-0">
					<div class="row col-12 m-0 p-0 text-center text-md-left justify-content-center">
                        <h3 id="check" class="col-12 col-md-6 p-0 m-0 align-self-center">Problem Description</h3>
						<div class="col-12 col-md-6 text-md-right p-0 m-0 mt-xs-2 mt-md-2">
							<div id="modeButton" class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="px-3 btn border border-secondary shadow-none btn-sm bg-scheme2 active">Jigsaw Mode</button>
								<button type="button" class="px-3 btn border border-secondary btn-sm shadow-none">Description Mode</button>
							</div>
						</div>
                        <label id="pointErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*add a point</label>
					</div>
					<div id="descriptionMode" class="row col-12 m-0 p-0 pt-5 pl-lg-5 d-none">
						<div class="col-12">
							<ul>
								<li class="col-sm-12 align-self-center">
                                    <p></p>
                                    <p>Add a point in the jigsaw Mode.</p>
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
						</div>
                    </div>
                    <div id="jigsawMode" class="p-4 p-0 m-0 row col-12 justify-content-start">
                        <div class="col-12 flex-column d-inline-flex">
                            <div class="jigsaw mt-1">
                                <span class="b"></span>
                                <textarea type='text' name='point1' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='point2' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='point3' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='point4' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='point5' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                            <div class="jigsaw mt-1 d-none">
                                <span class="t"></span>
                                <span></span>
                                <textarea type='text' name='point6' class="noscroll pl-3 text-dark" placeholder="Add a description point"></textarea>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row col-12 m-0 p-0 mt-3 justify-content-center">
					<input name="submit" type="submit" value="Post a Problem" class="col-9 col-md-3 mt-2 mt-md-0 btn btn-outline-secondary btn-sm px-5 mx-3">
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
