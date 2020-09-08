<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>

<style>

</style>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container-fluid mt-2" id="topBanner">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row mt-3">
                <div class="col-md-2">
                    <div class="bg-white products-spec">
                        <ul class="mx-0" style="list-style-type: none;">
                            <a href="/my_account/">
                                <li class="pl-2">
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
                                <li class="pl-2 bg-gray">
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
                            <a href="/logout//logout/">
                                <li>
                                    <p class="font-weight-bold text-warning text-center"> LOGOUT</p>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-sm-12 ">
                        <ul class="list-group m-0">

                            <?php

                            $rs = json_decode($data['response']['data'], true);

                            // echo "<pre>";

                            // var_dump($rs);
                            // echo "</pre>";

                            foreach ($rs as $key => $value) {
                                $id = $value['id'];
                                $tokon_id = $value['tokon_id'];
                                $is_added = $value['is_added'];
                                $is_lock = $value['is_lock'];
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
                                $img = $value['img'];
                                $slug = $value['slug'];
                                $price = $value['price'];
                                $partiallyAdded = $value['partiallyAdded'];



                                $phone_name = $brand . " " . $model;

                            ?>

                                <li class="list-group-item p-1 mb-4 products-items" id="hiderow<?php echo $id; ?>">

                                    <!-- /public/static/phones/70707DRV.jpg <a href="/phone_item/<?php echo $slug; ?>"> -->
                                    <div class="media align-items-lg-center flex-column flex-lg-row">
                                        <img src="/public/static/phones/<?php echo $img ?>" alt="" width="100" class="mr-3 order-lg-1">
                                        <div class="media-body order-2 order-lg-1">
                                            <h6 class="mt-0 font-weight-bold mb-2"><?php echo $phone_name; ?> (<?php echo $colour . ", " . $storage_capacity; ?>)<span class="right"><?php echo sniajaFormat($price); ?></span></h6>
                                            <!-- <p class="mb-0 p-0">100% working, good looking, perfect and Ok</p> -->
                                            <p class="text-orange p-0 font-weight-bold">Condition: <span><?php echo $d_condition; ?></span></p>
                                            <p class="text-orange p-0 font-weight-bold">Screen Size: <span><?php echo $screen_size; ?></span></p>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <!-- <h6 class="font-weight-bold my-2">&#8358;64,999</h6> -->
                                            </div>
                                            <div id="btn-wrapper<?php echo $id ?>">


                                                <?php
                                                if ($partiallyAdded == "1") {
                                                ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        Awaiting confirmation
                                                    </div>
                                                <?php
                                                } else {


                                                ?>
                                                    <div class="">
                                                        <!-- <p class="p-0 font-weight-bold d-inline">Ikeja, Today</p> -->
                                                        <button type="button" id="<?php echo $id; ?>" onclick="App.cancelBuyOrder(this.id)" class="btn btn-light ml-1 right"><i class="fas fa-edit"></i> Cancel</button>
                                                        <?php
                                                        if ($is_added === "0") {

                                                        ?>

                                                            <button type="button" id="<?php echo $id; ?>" onclick="App.addBuyOrder(this.id); return false;" class="btn btn-light right"><i class="fas fa-plus"></i> Add</button>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </a>  -->

                                </li>

                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- wallet balances -->
                    <?php require_once "public/page-parts/wallet-balances.php"; ?>

                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-5">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/cancel-listing.js"></script>
<script src="/public/static/js/add-block.js"></script>