<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container mt-2" id="topBanner">
    <div class="row">
        <div class="col-md-12" style="">
            <div class="text-center mt-2">
                <h3>We're waiting for your phone, <span id="user_name"></span></h3>
                <p>To unlock your funds ensure you send phone to the delivery location below.</p>
            </div>


            <?php
            // var_dump($data);
            $current_date = date("Y-m-d");

            ?>

            <div class="row my-4">
                <div class="col-md-4 ">
                    <p class="font-weight-bold text-gray">ORDER SUMMARY</p>
                    <div class="bg-white products-spec">
                        <div class="border-bottom p-2">
                            <p class="font-weight-bold p-0">YOUR ORDER(1 Item)</p>
                        </div>
                        <div class="p-2 py-4 border-bottom">
                            <div class="media">
                                <img src="/public/static/assets/company/m8.jpg" alt="" width="60" class="mr-2">
                                <div class="media-body">
                                    <p class="mt-0 py-0 para2" id="nameOfProduct">Galaxy Note 8 6.3-inch QHD</p>
                                    <p class="para2" id="storageOfProduct">(6GB, 64GB ROM) (12MP + 24)</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 border-bottom">
                            <p class="py-1">Subtotal<span class="float-right "><?php echo sniajaFormat(""); ?><span id="subTotalPrice">0</span></span></p>
                            <!-- <p class="py-1">Stability Fees<span class="float-right ">&#8358;0.23</span></p> -->
                        </div>
                        <div class="p-2">
                            <p class="py-1">Total<span class="float-right "><i class="fas fa-lock mr-1"></i><?php echo sniajaFormat(""); ?><span id="totalPrice">0</span></span></p>
                        </div>
                    </div>
                    <div class="text-center mt-3 mx-5">
                        <button type="button" class="btn btn-orange btn-block" onclick="App.lock()">Sell</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="bg-white products-spec" style="margin-top:40px">
                        <div class="p-2 px-4 border-bottom">
                            <p class="py-1 font-weight-bolder text-gray">Delivery Address</p>
                            <p class="py-1 font-weight-bolder"><span id="address"></span></p>
                            <p class="py-1 font-weight-bolder"><span id="state_o"></span></p>
                        </div>
                        <div class="p-2 px-4 border-bottom">
                            <p class="py-1 font-weight-bolder text-gray">Dilevery Date</p>
                            <p class="py-1 font-weight-bolder"><?php echo $current_date; ?></p>
                        </div>
                        <div class="p-2 px-4">
                            <p class="py-0 font-weight-bold">Notice!!!</p>
                            <p class="text-danger py-0">Make sure that the specification of your device corresponds with the specification of the buy order to avoid return.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/account-details.js"></script>

<script>
    $(document).ready(function() {
        let retrievedObject = JSON.parse(JSON.parse((localStorage.getItem('phoneObject'))));

        $("#nameOfProduct").html(retrievedObject.brand + " " + retrievedObject.model + " " + retrievedObject.screen_size);
        $("#storageOfProduct").html("(" + retrievedObject.ram + " RAM , " + retrievedObject.storage_capacity + " ROM ) (" + retrievedObject.selfie_camera + " +" + retrievedObject.main_camera + ")");
        $("#subTotalPrice").html(retrievedObject.price);
        $("#totalPrice").html(retrievedObject.price);
        $("#address").html(retrievedObject.address);
        $("#state_o").html(retrievedObject.lister_state);
        // console.log(retrievedObject);

    });
    // Retrieve the object from storage
</script>