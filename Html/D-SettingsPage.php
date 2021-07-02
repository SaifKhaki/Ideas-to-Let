<?php
	include_once("config/config.php");
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $fname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `f_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['f_name'];
        $lname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT `l_name` FROM `user_table` WHERE ( `user_id` = '$id')"))['l_name'];
        if (isset($_POST['submit1'])) {
            $nfname = mysqli_real_escape_string($mysqli, $_POST['f_name']);
            $nlname = mysqli_real_escape_string($mysqli, $_POST['l_name']);
            $opassword = mysqli_real_escape_string($mysqli, $_POST['o_password']);
            $npassword = mysqli_real_escape_string($mysqli, $_POST['n_password']);
            $storedPassword = mysqli_fetch_array(mysqli_query($mysqli,"SELECT e_password FROM `user_table` WHERE ( `user_id` = '$id')"))['e_password'];
            $passwordErr = false;
            if(trim($nfname)!='' && trim($nlname)!='')
                $result1 = mysqli_query($mysqli, "UPDATE `user_table` SET `f_name` = '$nfname', `l_name` = '$nlname' WHERE (`user_id` = '$id')");
            if ((trim($opassword)!='' && trim($npassword)!='')){
                if ($storedPassword == $opassword){
                    $result2 = mysqli_query($mysqli, "UPDATE `user_table` SET `e_password` = '$npassword' WHERE (`user_id` = '$id')");
                    header("Location: D-ShopPage.php");
                }else{
                    $passwordErr = true;
                }
            }
            
            $fileName = $_FILES['cover_photo']['name'];
            $fileTmpName = $_FILES['cover_photo']['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination1 = "../uploads/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination1);
            
            $fileName = $_FILES['display_photo']['name'];
            $fileTmpName = $_FILES['display_photo']['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination2 = "../uploads/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination2);
            if ((trim($fileDestination1)!='')){
                $result = mysqli_query($mysqli, "UPDATE `user_table` SET `cp` = '$fileDestination1' WHERE (`user_id` = '$id')");
            }
            if ((trim($fileDestination2)!='')){
                $result = mysqli_query($mysqli, "UPDATE `user_table` SET `dp` = '$fileDestination2' WHERE (`user_id` = '$id')");
            }
            
        }
    }
    else{
        header("Location: S-SigninPage.php");
    }

	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    <!-- icon fonts for upload iimage icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--External CSS-->
    <link rel="stylesheet" type="text/css" href="..\Css\common.css">
    <link rel="stylesheet" type="text/css" href="..\Css\D-Seller-SettingsPage.css">
    <!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--My JS-->
    <script type="text/javascript" src="..\js\common.js"></script>
    <script>
        $(document).ready(function () {   
            $password_err = "<?php echo $passwordErr;?>";
			if ($password_err) {
				$("#passwordErr").removeClass('d-none');
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
            $("#leftMenu button").on("click",function(){
                $index = $(this).index();
                $("#leftMenu button").removeClass("bg-transparent");
                $("#leftMenu button").removeClass("bg-scheme");
                $("#leftMenu button").not($(this)).addClass("bg-transparent");
                $(this).addClass("bg-scheme");
                $("#rightMenu form").addClass("d-none");
                $("#rightMenu form").eq($index).removeClass("d-none");
            });
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
                        <a href="D-PostProblemPage.php" class="nav-link" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post a Problem</button>
                        </a>
					</li>
					<li class="nav-item order-lg-last">
                        <a href="D-PostIdeaPage.php" class="nav-link" tabindex="-1" aria-disabled="true">
                            <button class="btn btn-outline-secondary btn-sm px-3" type="button">Post an Idea</button>
                        </a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-white" href="D-DashboardPage.php" tabindex="-1" aria-disabled="true">Dashboard</a>
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
    <div id="firstSection" class=" mt-5 row position-relative px-0 px-lg-5 mb-5 justify-content-center no-gutters text-dark">
		<div class="row col-12 m-0 mx-lg-5 pt-0 pt-sm-3 pt-md-5 pt-lg-4 pb-3 justify-content-center rounded bg-gray">
            <div class="row col-12 mt-3 text-center justify-content-center">
                <div class="col-12 col-lg-4">
                    <p id="name" class="h1 m-0 pl-0 mt-2"><?php echo $fname; echo " "; echo $lname;?></p>
                    <p>Computer Scientist</p>
                </div>
            </div>
            <div id="leftMenu" class="row col-6 col-lg-3 p-2 d-none d-lg-block justify-content-center sticky-top">
                <div class="row col-12">
                    <button class="btn col-12 p-1 m-0 mb-4 bg-scheme text-center rounded">
                        <h5>Personal</h5>
                    </button>
                </div>
            </div>
            
            <div class="row col-12 col-lg-9 px-3 py-2 justify-content-center">
                <div id="rightMenu" class="row col-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row col-12 bg-white m-0 mb-3 p-3">
                            <div class="col-12 mb-1">
                                <h4>Cover Photo</h4>
                            </div>
                            <input type="file" id="file1" name="cover_photo" accept="image/*" class="d-none">
                            <label for="file1" class="mb-3 ml-3 btn btn-outline-secondary rounded-pill px-5 bg-scheme2 align-self-center text-dark">
                                <span class="material-icons">
                                    add_photo_alternate
                                </span>
                                <span class="align-self-center">Upload Cover Photo</span>
                            </label>
                            <div class="col-12 mb-1">
                                <h4>Display Photo</h4>
                            </div>
                            <input type="file" id="file2" name="display_photo" accept="image/*" class="d-none">
                            <label for="file2" class="ml-3 btn btn-outline-secondary rounded-pill px-5 bg-scheme2 align-self-center text-dark">
                                <span class="material-icons">
                                    add_photo_alternate
                                </span>
                                <span class="align-self-center">Upload Display Photo</span>
                            </label>
                        </div>
                        <div class="row col-12 bg-white m-0 mb-3 p-3">
                            <div class="col-12 mb-4">
                                <h4>Username</h4>
                            </div>
                            <label class="col-12 my-0 py-0 font-weight-bold">New Username:</label>
                            <div class="form-group col-12 col-sm-6">
                                <input type="text" name="f_name" class="form-control no-outline input1 bg-white text-secondary" placeholder="First Name">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                            <input type="text" name="l_name" class="form-control no-outline input1 bg-white text-secondary" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row col-12 bg-white m-0 mb-3 p-3">
                            <div class="col-12 mb-4">
                                <h4>Password</h4>
                            </div>
                            <label class="col-12 my-0 py-0 font-weight-bold">Old Password:</label>
                            <div class="form-group col-12">
                                <input type="password" name="o_password" class="form-control no-outline input1 bg-white text-secondary" placeholder="Add current password here.">
                                <label id="passwordErr" class="col-12 m-0 p-0 mt-1 text-danger d-none">*password does not match.</label>
                            </div>
                            <label class="col-12 my-0 py-0 font-weight-bold">New Password:</label>
                            <div class="form-group col-12">
                                <input type="password" name="n_password" class="form-control no-outline input1 bg-white text-secondary" placeholder="Add new password here.">
                            </div>
                        </div>
                        <div class="row col-12 justify-content-center ">
                            <input type="submit" name="submit1" value="Save Changes" class="col-6 text-secondary btn btn-outline-secondary bg-scheme2 btn-sm px-3 mr-3">
                        </div>
                    </form>
                    
                </div>
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
