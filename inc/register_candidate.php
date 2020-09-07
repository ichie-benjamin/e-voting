
<div class="container">

    <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="omb_login">
            <h4 class="omb_authTitle">Fill In Candidates Details Appropriately</h4>

            <h4 class="text-center"><?php register_candidate(); ?>

            </h4>

            <div class="row omb_row-sm-offset- omb_regOr">
                <div class="col-xs-12 col-sm-12">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">Candidate Registration</span>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name *</label>
                            <input type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['register'])){ echo $_POST['first_name']; } ?>" class="form-control" placeholder="First Name" tabindex="1" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name *</label>
                            <input type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['register'])){ echo $_POST['last_name']; } ?>"   class="form-control" placeholder="Last Name" tabindex="1" required >
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Candidate Email *</label>
                            <input type="email" name="email" id="email" value="<?php if(isset($_POST['register'])){ echo $_POST['email']; } ?>"   class="form-control" placeholder="Candidate Email" tabindex="1" required >
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="position">Position *</label>

                            <select class="form-control" name="position" required>

                                <?php if(isset($_POST['register'])){?>
                                    <option value="<?php echo $_POST['position']; ?>" selected="selected"><?php echo $_POST['position']; ?></option>
                                <?php }else { ?>
                                    <option value="" selected="selected">- position-</option>
                                <?php } ?>

                                <option value="presidential">Presidential</option>
                                <option value="governorship">Governorship</option>
                                <option value="senatorial">Senatorial</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="party">Select Party</label>
                            <!--                <hr>-->
                            <select name="party_id" id="party" class="form-control">

                                <?php


                                $query = "SELECT * FROM party";
                                $select_party = mysqli_query($connection, $query);

                                confirmQuery($select_party);

                                while($row = mysqli_fetch_assoc($select_party)){
                                    $party_id = $row['id'];
                                    $name = $row['party_name'];
                                    $abbr = $row['party_abbr'];

                                    echo "<option value='$party_id'>{$name} ({$abbr})</option>";

                                }


                                ?>

                            </select>
                        </div>

                    </div>

                    <div class="col-xs-12 col-md-8">
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
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="age">Age *</label>
                            <input type="number" name="age" id="age" value="<?php if(isset($_POST['register'])){ echo $_POST['age'];} ?>"  class="form-control" placeholder="age" tabindex="2" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <hr>
                        <div class="form-group">
                            <label for="image">Candidates Passport *</label>
                            <input type="file" name="image" required>
                        </div>
                    </div>

                </div>
                <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Register Candidate</button>

            </form>

        </div>
    </div>






</div>