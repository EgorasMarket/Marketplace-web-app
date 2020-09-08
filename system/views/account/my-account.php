<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container-fluid mt-2" id="topBanner">
    
    <div class="row my-3">
        <div class="col-md-2 ">
            <div class="bg-white products-spec">
                <ul class="m-0" style="list-style-type: none;">
                    <a href="/my_account/">
                        <li class="pl-2 bg-gray">
                            <p class=""><i class="fas fa-user-alt mr-1"></i> My Account</p>
                        </li>
                    </a>
                    <a href="/orders/">
                        <li class="pl-2">
                            <p class=""><i class="fas fa-box mr-1"></i> Orders</p>
                        </li>
                    </a>
                    <!-- <a href="/wallet/">
                        <li class="pl-2">
                            <p class=""><i class="fas fa-wallet mr-1"></i> Wallet</p>
                        </li>
                    </a> -->
                    <a href="/my_listing/">
                        <li class="pl-2">
                            <p class=""><i class="fas fa-business-time mr-1"></i> My Listings</p>
                        </li>
                    </a>
                    <a href="/messages/">
                        <li class="pl-2 ">
                            <p class=""><i class="far fa-comments mr-1"></i> Messages</p>
                        </li>
                    </a>
                    <a href="/vault/">
                        <li class="pl-2 border-bottom">
                            <p class=""><i class="fas fa-shield-alt mr-1"></i> Vault</p>
                        </li>
                    </a>
                    <!-- <a href=""><li><p class="font-weight-bold"><i class="fas fa-business-time mr-1"></i> Egoras Earnings</p></li></a> -->
                    <a href="/logout/">
                        <li>
                            <p class="font-weight-bold text-warning text-center"> LOGOUT</p>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
<?php

$rs = json_decode($data, true);

// print_r($rs[0]['first_name']);
// $first_name = $rs[0]['first_name'];
if (!empty($rs)) {

    $first_name = $rs[0]['first_name'];
    $last_name = $rs[0]['last_name'];
    $email = $rs[0]['email'];
    $address = $rs[0]['address'];
    $state = $rs[0]['state'];
?>
            <div class="bg-white">
                <div class="p-1 mx-2 border-bottom">
                    <h5>Edit Account Information</h5>
                </div>
                <div class="p-3">
                    <form id="form11" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email Address</label>
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Country</label>
                                    <select id="scountry" name="country" onchange="changeCountry(value)" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">State</label>
                                    <select id="inputState" name="state" class="form-control">
                                        <!-- <option selected>Choose...</option>
                                        <option <?php if ($state == "Abia" ) echo 'selected' ; ?> value="Abia">Abia</option>
                                        <option <?php if ($state == "Adamawa" ) echo 'selected' ; ?> value="Adamawa">Adamawa</option>
                                        <option <?php if ($state == "Akwa Ibom" ) echo 'selected' ; ?> value="Akwa Ibom">Akwa Ibom</option>
                                        <option <?php if ($state == "Anambra" ) echo 'selected' ; ?> value="Anambra">Anambra</option>
                                        <option <?php if ($state == "Bauchi" ) echo 'selected' ; ?> value="Bauchi">Bauchi</option>
                                        <option <?php if ($state == "Bayelsa" ) echo 'selected' ; ?> value="Bayelsa">Bayelsa</option>
                                        <option <?php if ($state == "Benue" ) echo 'selected' ; ?> value="Benue">Benue</option>
                                        <option <?php if ($state == "Borno" ) echo 'selected' ; ?> value="Borno">Borno</option>
                                        <option <?php if ($state == "Cross River" ) echo 'selected' ; ?> value="Cross River">Cross River</option>
                                        <option <?php if ($state == "Delta" ) echo 'selected' ; ?> value="Delta">Delta</option>
                                        <option <?php if ($state == "Ebonyi" ) echo 'selected' ; ?> value="Ebonyi">Ebonyi</option>
                                        <option <?php if ($state == "Enugu" ) echo 'selected' ; ?> value="Enugu">Enugu</option>
                                        <option <?php if ($state == "Edo" ) echo 'selected' ; ?> value="Edo">Edo</option>
                                        <option <?php if ($state == "Ekiti" ) echo 'selected' ; ?> value="Ekiti">Ekiti</option>
                                        <option <?php if ($state == "Gombe" ) echo 'selected' ; ?> value="Gombe">Gombe</option>
                                        <option <?php if ($state == "Imo" ) echo 'selected' ; ?> value="Imo">Imo</option>
                                        <option <?php if ($state == "Jigawa" ) echo 'selected' ; ?> value="Jigawa">Jigawa</option>
                                        <option <?php if ($state == "Kaduna" ) echo 'selected' ; ?> value="Kaduna">Kaduna</option>
                                        <option <?php if ($state == "Kano" ) echo 'selected' ; ?> value="Kano">Kano</option>
                                        <option <?php if ($state == "Katsina" ) echo 'selected' ; ?> value="Katsina">Katsina</option>
                                        <option <?php if ($state == "Kebbi" ) echo 'selected' ; ?> value="Kebbi">Kebbi</option>
                                        <option <?php if ($state == "Kogi" ) echo 'selected' ; ?> value="Kogi">Kogi</option>
                                        <option <?php if ($state == "Kwara" ) echo 'selected' ; ?> value="Kwara">Kwara</option>
                                        <option <?php if ($state == "Lagos" ) echo 'selected' ; ?> value="Lagos">Lagos</option>
                                        <option <?php if ($state == "Nasarawa" ) echo 'selected' ; ?> value="Nasarawa">Nasarawa</option>
                                        <option <?php if ($state == "Niger" ) echo 'selected' ; ?> value="Niger">Niger</option>
                                        <option <?php if ($state == "Ogun" ) echo 'selected' ; ?> value="Ogun">Ogun</option>
                                        <option <?php if ($state == "Ondo" ) echo 'selected' ; ?> value="Ondo">Ondo</option>
                                        <option <?php if ($state == "Osun" ) echo 'selected' ; ?> value="Osun">Osun</option>
                                        <option <?php if ($state == "Oyo" ) echo 'selected' ; ?> value="Oyo">Oyo</option>
                                        <option <?php if ($state == "Plateau" ) echo 'selected' ; ?> value="Plateau">Plateau</option>
                                        <option <?php if ($state == "Rivers" ) echo 'selected' ; ?> value="Rivers">Rivers</option>
                                        <option <?php if ($state == "Sokoto" ) echo 'selected' ; ?> value="Sokoto">Sokoto</option>
                                        <option <?php if ($state == "Taraba" ) echo 'selected' ; ?> value="Taraba">Taraba</option>
                                        <option <?php if ($state == "Yobe" ) echo 'selected' ; ?> value="Yobe">Yobe</option>
                                        <option <?php if ($state == "Zamfara" ) echo 'selected' ; ?> value="Zamfara">Zamfara</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address</label>
                                    <textarea class="form-control" value="" id="address" name="address" rows="2"><?php echo $address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mx-5">
                            <input id="editacc" class="btn btn-orange btn-block" type="submit" value="Save">
                            <!-- <button id="editacc" type="button" class="btn btn-orange btn-block">Edit</button> -->
                        </div>
                    </form>
                    
                </div>
            </div>

<?php
} else {
?>
            <div class="bg-white">
                <div class="p-1 mx-2 border-bottom">
                    <h5>Account Information</h5>
                </div>
                <div class="p-3">
                    <form id="form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" name="first_name" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email Address</label>
                                    <input type="text" name="email" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" name="last_name" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Country</label>
                                    <select id="scountry" name="country" onchange="changeCountry(value)" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">State</label>
                                    <select id="inputState" name="state" class="form-control">
                                        <!-- <option selected>Choose...</option>
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
                                        <option value="Enugu">Enugu</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
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
                                        <option value="Nasarawa">Nasarawa</option>
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
                                        <option value="Zamfara">Zamfara</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address</label>
                                    <textarea class="form-control" value="" id="address" name="address" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mx-5">
                            <input class="btn btn-orange btn-block" type="submit" value="Save">
                        </div>
                    </form>
                    
                </div>
            </div>
<?php
}

?>
            

        </div>
        <div class="col-md-3">


            <div class="">
                <!-- Wallet Balances -->


                <?php require_once "public/page-parts/wallet-balances.php" ?>
            </div>
        </div>
    </div>
</div>



<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/edit-account.js"></script>
<script src="/public/static/js/supply-countries.js"></script>

<script>
$("#form").on('submit', (function(e) {
    e.preventDefault();
    var formData = new FormData(this)
    App.showModal();
    
    $.ajax({
        url: "/account_reg/",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,

        success: function(response) {

            console.log(response);

            var data = JSON.parse(response);

            if (data.error) {
                var error = data.error.msg;
                App.alerterWarning(error); 


            } else if (data.success) {
                var error = data.success.msg;
                App.alerterSuccesss(error);
                function explode(){
                    window.location.href = "/my_account/"
                }
                setTimeout(explode, 3000);


            }

        },
        error: function(e) {

        }
    });

}))

</script>
<script type="text/javascript">
function changeCountry(value) {
        var res = value.split("_");
        var country = res[0];
        var country_id = res[1];
        // alert(phone_id);
        array_id = {
                "id" : country_id
            }
        // alert(value);
        $.ajax({
            url: "/states",
            type: "POST",
            data:  array_id,
            
            
            success: function(data) {
                // console.log(data);
                var rs = JSON.parse(data);
                // $("#model").removeAttr('disabled');
                // console.log(rs.response.data);
                var listItems = '<option value="">Select State</option>';
                $.each(JSON.parse(rs.response.data), function(k, v) {

                    listItems += '<option value="' + v.states + '">' + v.states + '</option>';
                });
                $("#inputState").html(listItems);

                if(data.error){
                    var error = data.error.msg;
                }else if(data.success){
                    var error = data.success.msg;
                }    
            
            },
            error: function(e) {
        
            }          
        });
    }
</script>