<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `f_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['f_name'];
        $userDP = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM `user_table` WHERE ( `user_id` = '$id')"))['dp'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `l_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['l_name'];
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($mysqli, $_POST['title']);
            $photon = mysqli_real_escape_string($mysqli, $_POST['photons']);
            $fbLink = mysqli_real_escape_string($mysqli, $_POST['fb_link']);
            $youtubeLink = mysqli_real_escape_string($mysqli, $_POST['youtube_link']);
            $patreonLink = mysqli_real_escape_string($mysqli, $_POST['patreon_link']);
            $point1 = mysqli_real_escape_string($mysqli, $_POST['point1']);
            $point2 = mysqli_real_escape_string($mysqli, $_POST['point2']);
            $point3 = mysqli_real_escape_string($mysqli, $_POST['point3']);
            $point4 = mysqli_real_escape_string($mysqli, $_POST['point4']);
            $point5 = mysqli_real_escape_string($mysqli, $_POST['point5']);
            $point6 = mysqli_real_escape_string($mysqli, $_POST['point6']);
            $titleErr = false;
            $pointErr = false;
            
            $fileName = $_FILES['cover_photo']['name'];
            $fileTmpName = $_FILES['cover_photo']['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('',true).".png";
            $fileDestination1 = "../uploads/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination1);

            if(trim($title)!='' && trim($photon)!='' && trim($fileDestination1)!=''){
                $result1 = mysqli_query($mysqli, "INSERT INTO `idea_created`(`user_id`,`title`,`cp`,`photon`) VALUES('$id','$title','$fileDestination1','$photon')");
                $ideaID = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `idea_id` FROM `idea_created` WHERE ( `title` = '$title')"))['idea_id'];
                $result8 = mysqli_query($mysqli, "INSERT INTO `idea_links`(`idea_id`,`facebook`,`youtube`,`patreon`) VALUES('$ideaID','$fbLink','$youtubeLink','$patreonLink')");
                if (trim($point1)!=''){
                    $result2 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','1','$point1')");
                    $result3 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','2','$point2')");
                    $result4 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','3','$point3')");
                    $result5 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','4','$point4')");
                    $result6 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','5','$point5')");
                    $result7 = mysqli_query($mysqli, "INSERT INTO `idea_desc`(`idea_id`,`point_id`,`point_string`) VALUES('$ideaID','6','$point6')");
                    header("Location: D-PricingPage.php?ideaID=".$ideaID);
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
    <title>Post an Idea</title>
    <!-- icon fonts for upload iimage icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            setInterval(function(){
                if ($('input[id=file1]').val() != "") {
                    
                    $filename = $('input[id=file1]').val().split("\\");
                    $("label[for=file1]").text($filename[$filename.length-1]);
                }
                if ($('input[id=file2]').val() != "") {
                    $filename = $('input[id=file2]').val().split("\\");
                    $("label[for=file2]").text($filename[$filename.length-1]);
                }
            },1000);
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
    <div id="coverPhotoSection" class="container-fluid justify-content-center d-flex no-gutters p-0 mb-5 w-100">
        <!-- dynamic image here -->
        <img src="..\To be use\handPaper cover photo.png" alt="bulb" class="d-none">
        <div class="row justify-content-center align-self-center">
            <input type="file" id="file1" name="cover_photo" accept="image/*" class="d-none">
            <label for="file1" class="mb-3 ml-3 btn rounded-pill px-5 bg-scheme align-self-center text-dark">
                <span class="material-icons">
                    add_photo_alternate
                </span>
                <span class="align-self-center">Upload Cover Photo</span>
            </label>
        </div>
    </div>
    <div id="descriptionSection" class="row position-relative px-5 mb-5 justify-content-center">
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
                    <h5 class="col-12 col-md-3 col-lg-2 control-label align-self-center" for="inputSuccess">Idea Title</h5>
                    <div class="col-12 col-md-9 col-lg-10 align-self-center">
                        <input name="title" type="text" class="form-control" id="inputSuccess" placeholder="I have an idea of" value="">
                        <label id="titleErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*add title.</label>
                    </div>
                </div>
                <div class="col-12 row form-group m-0 p-0 mt-3">
                    <h5 class="col-8 col-sm-9 col-md-3 col-lg-2 order-1 control-label align-self-center" for="inputSuccess">Spend Photons</h5>
                    <div class="mt-4 mt-md-0 col-12 col-md-6 col-lg-9 order-3 order-md-2 pr-0 pr-md-2 align-self-center">
                        <input name="photons" type="range" class="form-control-range" id="formControlRange">
                    </div>
                    <button class="col-4 col-sm-3 col-lg-1 order-2 order-md-3 btn bg-scheme2 btn-outline-secondary align-self-center rounded text-center">Manage</button>
                </div>
                <div id="socialAccounts" class="col-lg-12 row form-group m-0 mt-3 bg-white p-3">
                    <h3 class="col-12 control-label align-self-center" for="inputSuccess">Link Accounts</h3>
                    <div class="col-12 row mt-3 text-center text-md-left justify-content-center justify-content-md-start">
                        <h5 class="col-12 col-md-4 col-lg-2 mt-3 order-2 order-md-1 control-label align-self-center" for="inputSuccess">Facebook</h5>
                        <div class="row col-6 col-md-2 col-lg-1 ml-0 pl-0 order-1 order-md-2 text-center text-md-left align-self-center justify-content-center">
                            <a href="">
                                <img src="https://img.icons8.com/color/48/000000/facebook-circled.png">
                            </a>
                        </div>
                        <div class="row col-auto col-lg-8 order-3 text-center text-md-left align-self-center">
                            <input name="fb_link" type="text" class="form-control" id="inputSuccess" placeholder="Paste Facebook link here" value="">
                        </div>
                    </div>
                    <div class="col-12 row mt-3 text-center text-md-left justify-content-center justify-content-md-start">
                        <h5 class="col-12 col-md-4 col-lg-2 mt-3 order-2 order-md-1 control-label align-self-center" for="inputSuccess">YouTube</h5>
                        <div class="row col-6 col-md-2 col-lg-1 ml-0 pl-0 order-1 order-md-2 text-center text-md-left align-self-center justify-content-center">
                            <a href="">
                                <img src="https://img.icons8.com/color/48/000000/play-button-circled.png" width="100%" />
                            </a>
                        </div>
                        <div class="row col-auto col-lg-8 order-3 text-center text-md-left align-self-center">
                            <input name="youtube_link" type="text" class="form-control" id="inputSuccess" placeholder="Paste Youtube link here" value="">
                        </div>
                    </div>
                    <div class="col-12 row mt-3 text-center text-md-left justify-content-center justify-content-md-start">
                        <h5 class="col-12 col-md-4 col-lg-2 mt-3 order-2 order-md-1 control-label align-self-center" for="inputSuccess">Patreon</h5>
                        <div class="row col-6 col-md-2 col-lg-1 ml-0 pl-0 order-1 order-md-2 text-center text-md-left align-self-center justify-content-center">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" height="40" viewBox="0 0 172 172"style=" fill:#000000;"><g transform=""><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="#f26552"></path><g fill="#000000"><path d="M40.13333,40.13333c-2.81316,0 -5.0963,2.28314 -5.0963,5.0963v81.54074c0,2.81316 2.28314,5.0963 5.0963,5.0963h10.19259c2.81316,0 5.0963,-2.28314 5.0963,-5.0963v-81.54074c0,-2.81316 -2.28314,-5.0963 -5.0963,-5.0963zM101.28889,40.13333c-19.66661,0 -35.67407,16.00747 -35.67407,35.67407c0,19.66661 16.00747,35.67407 35.67407,35.67407c19.66661,0 35.67407,-16.00747 35.67407,-35.67407c0,-19.66661 -16.00747,-35.67407 -35.67407,-35.67407z"></path></g></g></g></svg>
                            </a>
                        </div>
                        <div class="row col-auto col-lg-8 order-3 text-center text-md-left align-self-center">
                            <input name="patreon_link" type="text" class="form-control" id="inputSuccess" placeholder="Paste Patreon link here" value="">
                        </div>
                    </div>
                </div>
                <div id="modes" class="row col-12 m-0 mt-3 bg-white p-3 pr-0 mr-0">
					<div class="row col-12 m-0 p-0 text-center text-md-left justify-content-center">
                        <h3 class="col-12 col-md-6 p-0 m-0 align-self-center">Idea Description</h3>
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
                    <input name="submit" type="submit" value="Set a Pricing" class="col-9 col-md-3 mt-2 mt-md-0 btn btn-outline-secondary btn-sm px-5 mx-3">
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
        <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
