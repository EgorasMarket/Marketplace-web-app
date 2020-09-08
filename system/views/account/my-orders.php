<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<?php
$rs = json_decode($data['response']['data'], true);
$cookie_walletId =  $_COOKIE['walletId'];
// echo "<pre>";
// var_dump($data['response']['data']);
// echo "</pre>";

?>
<div class="container-fluid mt-2" id="topBanner">
    <div class="row mt-3">
        <div class="col-md-2 ">
            <div class="bg-white products-spec">
                <ul class="mx-0" style="list-style-type: none;">
                    <a href="/my_account/">
                        <li class="pl-2">
                            <p class=""><i class="fas fa-user-alt mr-1"></i> My Account</p>
                        </li>
                    </a>
                    <a href="/orders/">
                        <li class="pl-2 bg-gray">
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
                        <li class="pl-2">
                            <p class=""><i class="far fa-comments mr-1"></i> Messages</p>
                        </li>
                    </a>
                    <a href="/vault/">
                        <li class="pl-2 border-bottom">
                            <p class=""><i class="fas fa-shield-alt mr-1"></i> Vault</p>
                        </li>
                    </a>
                    <!-- <a href=""><li><p class="font-weight-bold"><i class="fas fa-business-time mr-1"></i> Egoras Earnings</p></li></a> -->
                    <a href="">
                        <li>
                            <p class="font-weight-bold text-warning text-center"> LOGOUT</p>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-white mb-4">
                <div class="row">
                    <div class="col-md-6 pr-0 border-right">
                        <div class="">
                            <div class="p-2 border-bottom mr-0">
                                <h5>My Orders</h5>
                            </div>
                            <div class="p-2" id="pendingOrdersContainer">
                                <?php


                                // echo "<pre>";
                                // var_dump($rs);
                                // echo "</pre>";

                                foreach ($rs as $key => $value) {
                                    if ($value['is_lock'] == "1" && $value['status'] !== "1") {
                                        $id = $value['id'];
                                        // $walletId = $value['walletId'];
                                        $category = $value['category'];
                                        $sub_category = $value['sub_category'];
                                        $brand = $value['brand'];
                                        $d_condition = $value['d_condition'];
                                        $storage_capacity = $value['storage_capacity'];
                                        $screen_size = $value['screen_size'];
                                        $selfie_camera = $value['selfie_camera'];
                                        $main_camera = $value['main_camera'];
                                        $model = $value['model'];
                                        $ram = $value['ram'];
                                        $colour = $value['colour'];
                                        $operaing_system = $value['operaing_system'];
                                        $sim = $value['sim'];
                                        $card_slot = $value['card_slot'];
                                        $battery = $value['battery'];
                                        $description = $value['description'];
                                        //    $img = $value['img'];
                                        $slug = $value['slug'];
                                        $price = $value['price'];
                                        $underdispute = $value['underdispute'];
                                        $initiatedBy = $value['initiatedBy'];
                                        $full_name = $value['full_name'];


                                        $phone_name = $brand . " " . $model;
                                        // setcookie("disputeInfo", $slug.' '.$walletId, time()+13600);



                                ?>
                                        <div class="border">
                                            <div class="bg-light p-1">
                                                <p class="font-weight-bold py-0">Pending Order Date: <?php echo $value['date_created']; ?></p>
                                            </div>
                                            <div class="p-2">
                                                <img id="myImg" src="/public/static/phones/<?php echo $value['img'] ?>" alt="" width="55" class="img-fluid">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="font-weight-bold pending-order p-0" id="device_name">
                                                            <?php echo   $brand . " " . $model ?></span>
                                                        <p class="p-0"><span class="font-weight-bold pending-order p-0">Total:</span> <span id="mprice"><?php echo  $price; ?></span></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!-- <div class="text-right">
                                                            <span class="font-weight-bold pending-order p-0">Delivery Address:</span>
                                                            <p class="p-0 pending-order" id="address"></p>
                                                            <p class="p-0 pending-order" id="state_o"></p>
                                                        </div> -->

                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php
                                                        if ($underdispute == "1") {
                                                            if ($initiatedBy == $_COOKIE['walletId']) {
                                                                if ($_COOKIE['walletId'] == $value['lockBy']) {
                                                        ?>
                                                                    <div class="alert alert-danger " role="alert">
                                                                        <small>You have initiated dispute <a href="/dispute/<?php echo $slug; ?>" class="btn btn-link btn-sm">click here</a> upload proof you have sent the item & also monitor the progress </small>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="alert alert-danger " role="alert">
                                                                        <small>This trade is under dispute. Please <a href="/dispute/<?php echo $slug; ?>" class="btn btn-link btn-sm">click here</a> to settle dispute </small> </div>
                                                                <?php
                                                                }
                                                                ?>

                                                                <?php
                                                            } else {
                                                                if ($_COOKIE['walletId'] == $value['lockBy']) {
                                                                ?>
                                                                    <div class="alert alert-danger " role="alert">
                                                                        <small>You have initiated dispute, <a href="/dispute/<?php echo $slug; ?>" class="btn btn-link btn-sm">click here</a> upload proof you have sent the item & also monitor the progress </small>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="alert alert-danger " role="alert">
                                                                        <small>This trade is under dispute <a href="/dispute/<?php echo $slug; ?>" class="btn btn-link btn-sm">click here</a> to settle dispute. Please </small> </div>
                                                                <?php
                                                                }
                                                                ?>


                                                            <?php
                                                            }
                                                        } else {


                                                            if (strtolower($cookie_walletId) == strtolower($value['lockBy'])) {
                                                            ?> <div class="alert alert-warning " role="alert">
                                                                    <small>Awaiting custodian to release fund.</small>
                                                                </div>
                                                                <button id="<?php echo $id; ?>" onclick="App.initiateDispute(this.id)" class="btn btn-warning btn-sm">Dispute</button>

                                                            <?php
                                                            } else {



                                                            ?>

                                                                <div class="alert alert-warning " role="alert">
                                                                    <small>Make sure that you have received the item before releasing fund.</small>
                                                                </div>
                                                                <button id="<?php echo $id; ?>" onclick="App.initiateDispute(this.id)" class="btn btn-warning btn-sm">Dispute</button>

                                                                <button type="button" id="<?php echo $value['tokon_id']; ?>" onclick="App.releaseFund(this.id)" class="btn btn-info btn-sm">Release Fund</button>
                                                        <?php

                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php

                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-0">
                        <div class="p-2 border-bottom">
                            <h5>Order History</h5>
                        </div>
                        <div class="p-2 border-left">
                            <ul class="list-group ml-0">
                                <?php


                                // echo "<pre>";
                                // var_dump($rs);
                                // echo "</pre>";

                                foreach ($rs as $key => $value) {
                                    if ($value['status'] == "1") {
                                        $id = $value['id'];
                                        $category = $value['category'];
                                        $sub_category = $value['sub_category'];
                                        $brand = $value['brand'];
                                        $d_condition = $value['d_condition'];
                                        $storage_capacity = $value['storage_capacity'];
                                        $screen_size = $value['screen_size'];
                                        $selfie_camera = $value['selfie_camera'];
                                        $main_camera = $value['main_camera'];
                                        $model = $value['model'];
                                        $ram = $value['ram'];
                                        $colour = $value['colour'];
                                        $operaing_system = $value['operaing_system'];
                                        $sim = $value['sim'];
                                        $card_slot = $value['card_slot'];
                                        $battery = $value['battery'];
                                        $description = $value['description'];
                                        //    $img = $value['img'];
                                        //    $slug = $value['slug'];
                                        $price = $value['price'];

                                        $phone_name = $brand . " " . $model;



                                ?>
                                        <li class="list-group-item mb-4 p-1 ">
                                            <a href="">
                                                <div class="media align-items-lg-center flex-column flex-lg-row">
                                                    <img src="/public/static/phones/<?php echo $value['img'] ?>" alt="" width="50" class="img-fluid mr-1 order-lg-1">
                                                    <div class="media-body order-2 order-lg-1">
                                                        <h5 class="mt-0 font-weight-bold mb-2"><?php echo $phone_name . " (" . $colour . ", " . $storage_capacity . ")"; ?> </h5>
                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                            <h6 class="font-weight-bold my-2">&#8358;<?php echo $price; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!-- Wallet Balances -->


            <?php require_once "public/page-parts/wallet-balances.php" ?>
            <!-- <div class="bg-white">
                
            </div> -->
        </div>
    </div>
</div>



<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/account-details.js"></script>
<script src="/public/static/js/pending-order.js"></script>