<?php

require_once("inc/config.php");

?>



<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online E-voting System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Fonts -->




    <!-- CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">


    <!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW(
        ).init();
    </script>


</head>
<body>


<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-3">
                <a href="#" class="logo">
                    <img src="images/ine.png" height="40px">
                </a>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="menu">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Home</a></li>
                                    <li ><a href="login.php">Login</a></li>
                                    <li><a href="">About Us</a></li>

                                    <li class="active"><a href="register.php">Register</a></li>

                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>




        </div>
    </div>
</header>





<section id="service">


    <div class="container">
<br>
<br>
<br>
<br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-6 wow fadeInRight" data-wow-delay=".8s">
                <h2 class="text-center">Voters Registration Page.</h2>
                <hr class="colorgraph">

                <?php register_user() ?>
                <form role="form" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="first_name">First Name *</label>
                                <input type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['register'])){ echo $_POST['first_name']; } ?>" class="form-control" placeholder="First Name" tabindex="1" required>
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="last_name">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['register'])){ echo $_POST['last_name']; } ?>"   class="form-control" placeholder="Last Name" tabindex="1" required >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="maiden_name">Maiden Name *</label>
                                <input type="text" name="maiden_name" id="maiden_name" value="<?php if(isset($_POST['register'])){ echo $_POST['maiden_name'];} ?>"  class="form-control" placeholder="Maiden Name" tabindex="2" required>
                            </div>
                        </div>
                    </div>
				<div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="occupation">Occupation *</label>
                                <input type="text" name="occupation" id="occupation" value="<?php if(isset($_POST['register'])){ echo $_POST['occupation']; } ?>"  class="form-control" placeholder="Occupation" tabindex="1" required>
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="religion">Religion *</label>
                                <input type="text" name="religion" id="religion" value="<?php if(isset($_POST['register'])){ echo $_POST['religion'];}  ?>"  class="form-control" placeholder="Religion" tabindex="1" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="marital_status">Marital Status *</label>
								
								<select class="form-control" name="marital_status" required>
                                    
									<?php if(isset($_POST['register'])){?>	
                                   <option value="<?php echo $_POST['marital_status']; ?>" selected="selected"><?php echo $_POST['marital_status']; ?></option>
									<?php }else { ?>
                                    <option value="" selected="selected">- Marital Status-</option>
									<?php } ?>
									
                                    <option value="male">single</option>
                                    <option value="married">married</option>
                                    <option value="others">others</option>
                                </select>
							
                            </div>
                        </div>
                    </div>
				<div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
								<label for="email">Email Address*</label>
                                <input type="email" name="email" id="email" value="<?php if(isset($_POST['register'])){ echo $_POST['email'];}  ?>"  class="form-control" placeholder="Email" tabindex="1" required>
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
								<label for="phone">Phone *</label>
                                <input type="number" name="phone" id="phone" value="<?php if(isset($_POST['register'])){ echo $_POST['phone'];} ?>"  class="form-control" placeholder="Phone Number" tabindex="1" required>
                            </div>
                        </div>
                       
                    </div>
                  
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?php if(isset($_POST['register'])){ echo $_POST['username'];}  ?>"  class="form-control" placeholder="Username" tabindex="5" required>
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="5" password>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" tabindex="6" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="city">City</label>
                                <input type="text" name="city" id="city" value="<?php if(isset($_POST['register'])){ echo $_POST['city']; } ?>"  class="form-control" placeholder="city" tabindex="5" required>
                            </div>
                        </div>
						
						<div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
								<label for="lga"> LGA </label>
                                <input type="text" name="lga" id="lga" value="<?php if(isset($_POST['register'])){ echo $_POST['lga'];} ?>"  class="form-control" placeholder="Local Govt. Area" tabindex="5" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
<label>State Of Origin</label>
                                <select class="form-control" name="state" id="state" required>
									<?php if(isset($_POST['register'])){?>
									
                                    <option value="<?php echo $_POST['state']; ?>" selected="selected"><?php echo $_POST['state']; ?></option>
									<?php }else { ?>
                                    <option value="" selected="selected">- Select State-</option>
									<?php } ?>
                                    <option value="Abuja FCT">Abuja FCT</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nassarawa">Nassarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>

                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group">
						<label for="address">Residential Address</label>
                        <input type="address" name="address" id="address" value="<?php if(isset($_POST['register'])){ echo $_POST['address'];} ?>"  class="form-control" placeholder="Residential Address" tabindex="4">
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
								<label>Gender</label>
                                <select class="form-control" name="gender" required>
                                    
									<?php if(isset($_POST['register'])){?>	
                                   <option value="<?php echo $_POST['gender']; ?>" selected="selected"><?php echo $_POST['gender']; ?></option>
									<?php }else { ?>
                                    <option value="" selected="selected">- Gender-</option>
									<?php } ?>
									
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2">
                            <div class="form-group">
								<label for="birth_day">Day of Birth</label>
                                <input placeholder="day" max="31" type="number" value="<?php if(isset($_POST['register'])){ echo $_POST['birth_day'];}  ?>"  id="birth_day" name="birth_day" class="form-control" tabindex="6" required>
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="form-group">
								<label for="birth_month">Mon. Of Birth</label>
                                <input placeholder="Month" max="12" type="number" value="<?php if(isset($_POST['register'])){ echo $_POST['birth_month']; } ?>"  id="birth_month" name="birth_month" class="form-control" tabindex="6">
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="form-group">
								<label for="birth_year">Yr. Of Birth</label>
                                <input placeholder="Year" max="1999" type="number" value="<?php if(isset($_POST['register'])){ echo $_POST['birth_year']; } ?>" id="birth_year" class="form-control" name="birth_year" tabindex="6">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                            By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" name="register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-sm-6 wow fadeInRight" data-wow-delay=".8s"></div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                    </div>
                    <div class="modal-body">
                        <p>Terms and condition here</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>


</section>

<footer class="wow fadeInUp" data-wow-delay=".8s">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © 2017 E-Voting System. All rights reserved.</p>

            </div>
        </div>
    </div>
</footer>




</body>
</html>
