<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>

<style>

</style>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<style>


</style>
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
                                <li class="pl-2">
                                    <p class="font-weight-bold text-warning text-center"> LOGOUT</p>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white products-spec mb-3">
                        <div class="card-body">
                            <h5>List Buy Order</h5>
                        </div>
                        <div class="p-4">
                            <form id="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <div class="form-group">
                                            <input type="hidden" name="walletId" value="<?php echo $walletId; ?>">
                                            <label class="font-weight-bold">Category</label>
                                            <select class="form-control" id="category" name="category">
                                                <option>Default select</option>
                                                <option>Mobile Phones & Tablets</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Sub Category</label>
                                            <select class="form-control" onchange="changeSub(value);" id="sub_category" name="sub_category">
                                                <option>Default select</option>
                                                <option value="smartphones">Smartphones</option>
                                                <option value="tablets">Tablets</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Brand</label>
                                            <select class="form-control" onchange="changeBrand(value);" id="brand" name="brand">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Model</label>
                                            <select class="form-control" onchange="changeModel(value);" id="model" name="model">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Condition</label>
                                            <select class="form-control" id="condition" name="condition">
                                                <option>Default select</option>
                                                <option value="New">New</option>
                                                <option value="Used">Used</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Storage Capacity</label>
                                            <select class="form-control" id="storage_cap" name="storage_cap">
                                                <option>Default select</option>
                                                <option value="512 MB">512 MB</option>
                                                <option value="4 GB">4 GB</option>
                                                <option value="8 GB">8 GB</option>
                                                <option value="16 GB">16 GB</option>
                                                <option value="32 GB">32 GB</option>
                                                <option value="64 GB">64 GB</option>
                                                <option value="128 GB">128 GB</option>
                                                <option value="256 GB">256 GB</option>
                                                <option value="512 GB">512 GB</option>
                                                <option value="1 TB">1 TB</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Screen Size</label>
                                            <select class="form-control" id="screen_size" name="screen_size">
                                                <option>Default select</option>
                                                <option value="&lt; 4-inches">&lt; 4 inches</option>
                                                <option value="4.5-inches">4-5 inches</option>
                                                <option value="5.5-inches">5.1-6 inches</option>
                                                <option value="6.1 &gt; inches">6.1 &gt; inches</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Selfie Camera</label>
                                            <select class="form-control" id="selfie_cam" name="selfie_cam">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Main Camera</label>
                                            <select class="form-control" id="main_cam" name="main_cam">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left">

                                        <div class="form-group">
                                            <label class="font-weight-bold">RAM</label>
                                            <select class="form-control" id="ram" name="ram">
                                                <option>Default select</option>
                                                <option value="&lt; 512 MB">&lt; 512 MB</option>
                                                <option value="1 GB">1 GB</option>
                                                <option value="2 GB">2 GB</option>
                                                <option value="3 GB">3 GB</option>
                                                <option value="4 GB">4 GB</option>
                                                <option value="6 GB">6 GB</option>
                                                <option value="8 GB">8 GB</option>
                                                <option value="12 GB">12 GB</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Colour</label>
                                            <select class="form-control" id="colour" name="colour">
                                                <option>Default select</option>
                                                <option value="Black">Black</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Gold">Gold</option>
                                                <option value="Gray">Gray</option>
                                                <option value="Green">Green</option>
                                                <option value="Pink">Pink</option>
                                                <option value="Red">Red</option>
                                                <option value="Silver">Silver</option>
                                                <option value="White">White</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Operating System</label>
                                            <select class="form-control" id="operating_sys" name="operating_sys">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">SIM</label>
                                            <select class="form-control" id="sim" name="sim">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Card Slot</label>
                                            <select class="form-control" id="card_slot" name="card_slot">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Battery (mAh)</label>
                                            <select class="form-control" id="battery" name="battery">

                                            </select>
                                        </div>
                                        <label class="font-weight-bold">Price</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php echo niajaFormat("") ?></div>
                                            </div>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Country</label>
                                            <select class="form-control" onchange="changeCountry(value);" id="scountry" name="country">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">State</label>
                                            <select class="form-control" id="state" name="state">

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <h3>Image Upload</h3>
                                        <p class="bg-warning" style="border-radius: 4px; padding: 5px;">The first image is compulsory!</p>
                                        <div class="row mt-4">


                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <!-- <label class="font-weight-bold">Upload image 1</label> -->
                                                    <!-- <input class="form-control-file" id="img"> -->

                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" type="file" name="file1" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload2" type="file" name="file2" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload2" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview2" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload3" type="file" name="file3" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload3" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview3" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload4" type="file" name="file4" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload4" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview4" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload5" type="file" name="file5" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload5" class="edit-icon">,<i class="fa fa-edit "></i></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview5" style="background-image: url(/public/static/assets/logos/add-image.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-2">
                                            <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                            <textarea class="form-control" placeholder="Description" id="description" name="description" rows="2"></textarea>
                                            <div class="mt-3">
                                                <input class="btn btn-orange btn-block" type="submit" id="list" value="LIST">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <!-- Wallet Balances -->


                    <?php require_once "public/page-parts/wallet-balances.php" ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/supply-details.js"></script>
<script src="/public/static/js/supply-countries.js"></script>
<script src="/public/static/js/listing-states.js"></script>
<script src="/public/static/js/list-order.js"></script>
<script>
    $(document).ready(function() {
        $('#brand').attr("disabled", "disabled");
        $('#model').attr("disabled", "disabled");

        $('#selfie_cam').attr("disabled", "disabled");
        $('#main_cam').attr("disabled", "disabled");
        $('#operating_sys').attr("disabled", "disabled");
        $('#sim').attr("disabled", "disabled");
        $('#card_slot').attr("disabled", "disabled");
        $('#battery').attr("disabled", "disabled");
    })
</script>