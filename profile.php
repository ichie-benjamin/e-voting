
<?php

require_once("inc/header.php");
?>


<style>
    .id_card {
        height: 300px;
        width: 500px;
        border: 1px solid black;
    }
    
    .id_card .inf{
        font-weight: bold;
    }


</style>
<section id="banner" class="wow fadeInUp">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <div class="container">
<div class="row">

<?php

$query = "SELECT * FROM voters  WHERE voters_id = {$_SESSION['voters_id']} LIMIT 1";
$select_voters = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_voters)) {
    $username = $row['username'];
    $maiden_name = $row['maiden_name'];
    $voters_id = $row['voters_id'];
    $occupation = $row['occupation'];
    $religion = $row['religion'];
    $passport = $row['passport'];
    $state = $row['state'];
    $gender = $row['sex'];
    $address = $row['residential_address'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $vote_president = $row['vote_president'];
    $vote_governor = $row['vote_governor'];
    $vote_senate = $row['vote_senatorial'];
}

?>

    <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="id_card">
            <div class="hed">
                <div class="row">
                    <div class="col-xs-3">
                        <img height="70" src="images/ine.png">

                    </div>
                    <div class="col-xs-9" >
                        <h3 class="" style="background: #3071a9;">INDEPENDENT NATIONAL ELECTORIAL COMMISION</h3>
                    </div>
                </div>

            </div>

            <div class="">
                <p class="btn btn-primary btn-block">INEC 2018/2019 GENERAL ELECTION</p>

            </div>
            <div class="row">
                <div class="col-xs-6">

                    <p><span class="bg-primary">Voting Number</span> :</p>
                    <p><span class="bg-primary">Occupation </span>: <span class="inf"><?php echo $occupation ?></span> </p>
                    <p> <span class="bg-primary">Date-Of-Birth </span>: <span class="inf">20-11-1990</span></p>
                    <p><span class="bg-primary">State Of Origin </span>: <span class="inf"><?php echo $state ?></span></p>
                    <p><span class="bg-primary">Sex </span>: <span class="inf"><?php echo $gender ?></span></p>
                    <p><span class="bg-primary">ADDRESS </span>:</p>
                </div>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <div class="pull-right" >
                            <p class="inf" style="color: #2b542c;"><?php echo $voters_id ?></p>
                            <img src="images/voters/<?php echo $passport ?>" height="80" />
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <p class="pull-right text-uppercase"><?php echo $first_name .' '. $last_name ?></p>
                    </div>
                    <div class="col-xs-12">
                        <p class="pull-right text-justify"><?php echo $address ?></p>
                    </div>



                </div>

            </div>
        </div>


    </div>

    <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="omb_login text-center">
            <div class="id_card">

                <div class="pull-left">
                    <img height="70" src="images/ineclogo.png">
                </div>
                <div class="pull-right">
                    <img height="70" src="images/ineclogo.png">
                </div>

                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">

                        <p class="text-center">This is to certify that Omolarin Kayode
                            Whose photograph and fingerprint appears
                            on the ID card is a bonified voter
                            Of Independent National Electoral
                            Commission (INEC) of Federal Republic of
                            Nigeria. If found please, return to the address
                            overleaf Or the nearest police station.</p>

                    </div>
                </div>


            </div>


        </div>
    </div>

</div>


        <div class="row">
            <br>
            <br>
            <h3 class="text-center">Print Your Voters Card By Pressing Ctrl + P </h3>
        </div>






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


<script>
    $(function () {
        $("#docLocator").change(function() {
            var val = $(this).val();
            if(val === "doc") {

                $("#spec").hide(1000);

            }
            else if(val === "spec") {
                $("#spec").show(1000);

            }
        });

        $("#drugSelect").change(function() {
            var val = $(this).val();
            if(val === "drug") {

                $("#drugTypes").show(1000);

            }
            else if(val === "supplement") {
                $("#drugTypes").hide(1000);

            }
        });

        $('#state').change(function(){
            $("#submit").prop('disabled', false);
        });

    });
</script>


</body>
</html>
