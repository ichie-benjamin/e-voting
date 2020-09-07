
<div class="container">

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
                            <input type="hidden" name="voter_thumb" value="<?php  echo $_SESSION['voters_thumb'];  ?>">
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
                            <label for="maiden_name">Mothers Maiden Name *</label>
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
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="secret_qus">Choose Secret Question*</label>
                            <select class="form-control" name="secret_qus" required>

                                <?php if(isset($_POST['register'])){?>
                                    <option value="<?php echo $_POST['secret_qus']; ?>" selected="selected"><?php echo $_POST['secret_qus']; ?></option>
                                <?php }else { ?>
                                    <option value="" selected="selected">- Choose A Secret Question -</option>
                                <?php } ?>

                                <option value="In which town did your father meet your mother">In which town did your father meet your mother</option>
                                <option value="Whats the name of your best friend">Whats the name of your best friend</option>
                                <option value="Whats the name of your best primary school teacher">Whats the name of your best primary school teacher</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="phone">Secret Question Answer *</label>
                            <input type="text" name="answer" id="phone" value="<?php if(isset($_POST['register'])){ echo $_POST['answer'];} ?>"  class="form-control" placeholder="Answer To Your Secret Question" tabindex="1" required>
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


                <hr class="colorgraph">
                <div class="row">
                    <div class="col-md-12"><input type="submit" value="Register" name="register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>
        </div>


    </div>
<!-- /.modal -->
</div>

