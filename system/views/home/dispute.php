<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container mt-2" id="topBanner">
    <?php

    if (isset($data->response->data[0]->walletId)) {

        $moderator_message = "";

        if (strtolower($data->response->data[0]->walletId) == strtolower($data->response->data[0]->initiatedBy)) {
            $moderator_message = "The <b>buyer</b> triggered this dispute because he/she have not received the <b>" . $data->response->data[0]->full_name . "</b>.  Please investigate and act accordingly. ";
        } else if (strtolower($data->response->data[0]->lockBy) == strtolower($data->response->data[0]->initiatedBy)) {
            $moderator_message = "The <b>seller</b> triggered this dispute because he/she have sent the <b>" . $data->response->data[0]->full_name . "</b> to the <b>buyer</b>.  Please investigate and act accordingly. ";
        }
    ?>
        <div class="row">
            <div class="col-md-12" style="">
                <!-- <div class="text-center mt-2">
                <h3>We're waiting for your phone, <span id="user_name"></span></h3>
                
            </div> -->


                <?php
                // var_dump($data);
                $current_date = date("Y-m-d");

                ?>

                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="col-md-6" style="margin: 0 auto;">
                            <h4 class="text-center"> <span class="badge badge-danger">Trade is under dispute</span></h4>
                            <?php

                            if (strtolower($data->response->data[0]->walletId) == strtolower($_COOKIE['walletId'])) {
                            ?>

                                <div class="alert alert-warning" role="alert">
                                    <p class="text-center">If you have receive the item please release the fund </p>
                                </div>
                                <div style="text-align: center;">
                                    <button type="button" id="<?php echo $data->response->data[0]->tokon_id; ?>" onclick="App.releaseFund(this.id)" class="btn btn-success btn-sm "><i class="fas fa-arrow-right"></i> Release fund</button>
                                </div>

                            <?php
                            } else if (strtolower($data->response->data[0]->lockBy) == strtolower($_COOKIE['walletId'])) {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    <p class="text-center">Please <b>seller</b>, upload proof to show you have sent the item to the custodian, if you DO NOT upload the proof WITHIN NEXT 24 hours, we will cancel
                                        this trade, unfreeze fund for custodian and your trust score will be harmed..</p>
                                </div>

                                <div style="text-align: center;">
                                    <button type="button" id="<?php echo $data->response->data[0]->tokon_id; ?>" onclick="App.unlockToken(this.id);" class="btn btn-info btn-sm "><i class="fas fa-retweet"></i> Unfreeze Item</button>
                                </div>
                            <?php } else {

                            ?>

                                <div class="alert alert-warning" role="alert">
                                    <p class="text-center"><?php echo $moderator_message; ?></p>
                                </div>

                                <div style="text-align: center;">
                                    <button type="button" id="<?php echo $data->response->data[0]->tokon_id; ?>" onclick="App.settleDispute(this.id);" class="btn btn-success btn-sm "><i class="fas fa-arrow-right"></i> Settle Seller</button>
                                    <button type="button" id="<?php echo $data->response->data[0]->tokon_id; ?>" onclick="App.unlockToken(this.id);" class="btn btn-warning btn-sm "><i class="fas fa-retweet"></i> Unfreeze Item For Buyer</button>
                                </div>
                            <?php
                            } ?>


                        </div>

                        <form id="form">

                            <div class="send-wrap ">
                                <input type="hidden" id="slug" name="slug" value="<?php echo $data->response->data[0]->slug; ?>">
                                <textarea class="form-control send-message" id="disputeMessage" name="disputeMessage" rows="3" placeholder="Write your message here..."></textarea>
                            </div>
                            <div class="col-md-3" id="dispute-avatar">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload5" type="file" name="file" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload5" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview5" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-3 mt-2">
                                <!-- <a href="" class=" col-lg-3 btn send-message-btn " role="button"><i class="fas fa-cloud-upload-alt"></i> Add Files</a> -->
                                <!-- <input type="file" name="file" class="form-control-file col-lg-3 btn" id="img"> -->
                                <button class=" col-lg-6 btn btn-warning " type="submit"><i class="fa fa-plus"></i> Send Message</button>
                                <!-- <button class=" col-lg-4 text-right btn send-message-btn right" role="button"><i class="fa fa-plus"></i> Send Message</button> -->
                            </div>
                        </form>
                        <div class="row ">
                            <!-- <div class="col-md-6">
                            <button type="button" class="btn btn-outline-orange btn-block">Report Transaction</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-outline-orange btn-block">Cancel Transaction</button>
                        </div> -->

                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="message-wrap col-lg-12">
                                <div class="msg-wrap" id="disputemsg">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
    ?>
        <div class="alert alert-warning " role="alert">
            <h1 class="text-center">The item is not under dispute</h1>
        </div>
        <br />
        <br />
        <br />
        <br />
    <?php
    } ?>
</div>


<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/account-details.js"></script>
<script src="/public/static/js/lacalstorage.js"></script>
<script src="/public/static/js/submit-dispute.js"></script>
<script src="/public/static/js/supply-dispute.js"></script>

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