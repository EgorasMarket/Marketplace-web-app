<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<style>
    .exchange {
        min-width: 100px;
    }
</style>
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
                        <li class="pl-2">
                            <p class=""><i class="fas fa-box mr-1"></i> Orders</p>
                        </li>
                    </a>
                    <!-- <a href="/wallet/"><li class="pl-2"><p class=""><i class="fas fa-wallet mr-1"></i> Wallet</p></li></a> -->
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
                        <li class="pl-2 bg-gray border-bottom">
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
            <div class="row">
                <div class="col-md-8 offset-md-2 col-sm-12">
                    <div class="bg-white border">
                        <div class="p-2">
                            <h5 class="text-center">
                                <img src="/public/static/assets/company/user2.png" alt="" width="25" class="img-fluid left">
                                Vault
                                <img src="/public/static/assets/company/settings-cog.png" alt="" width="25" class="img-fluid right">
                            </h5>
                        </div>
                        <div class="p-3 my-4 text-center">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <button type="button" class="btn exchange"><span id="send" class="send"></span></button>
                                    <div class="form-group">
                                        <input type="number" id="VaultInput" class="form-control vault mt-1" id="" placeholder="INPUT AMOUNT">
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <button type="button" class="btn swap" id="swap"><img src="/public/static/assets/company/swap.png" alt="" width="25" class="img-fluid"></button>
                                </div>
                                <div class="col-md-4 col-4">
                                    <button type="button" class="btn exchange"><span id="receive" class="receive"></span></button>
                                    <div class="form-group">
                                        <input type="number" id="VaultOutput" readonly class="form-control vault mt-1" id="" placeholder="OUTPUT AMOUNT">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-orange btn-block" onclick="App.GenerateCoin()" type="button"><span id="finalact"></span> EUSD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php require "public/page-parts/wallet-balances-single.php"; ?>
            <div class="bg-white my-4">
                <div class="p-2">
                    <h5>System Info</h5>
                    <p><b>EGR PRICE <span class="right"><span class="egrVaultPrice">0.00</span></span></b></p>
                    <p><b>IN VAULT <span class="right"><span class="egrInVault">0.00</span> EGR</span></b><small class="text-right egrUSDValue" style="display: block;">0.00$</small></p>
                    <p><b>TOTAL EUSD SUPPLY <span class="right"><span class="eusdTotalSupply">0.00</span> EUSD</span></b></p>
                    <p class="text-uppercase"><b>Collateralization Ratio <span class="right ratioValue">0.00%</span></b> </p>
                </div>
            </div>
            <!-- <div class="bg-white">
                
            </div> -->
        </div>
    </div>
</div>



<?php require_once("public/page-parts/site-footer.php") ?>
<script>
    let selected = "eusd";
    $(document).ready(function() {

        var send = '<img src="/public/static/assets/logos/egoras-dollar.png" style="width:10px;" class="img-fluid"><p>EUSD</p>'
        $("#send").html(send);
        var receive = '<img src="/public/static/assets/company/egoras-face.png" alt="" width="25" class="img-fluid"><p>EGR</p>'
        $("#receive").html(receive);
        var generate = 'Generate';
        var redeem = 'Redeem';
        $("#finalact").html(redeem);

        $("#swap").on('click', (function() {
            $("#VaultOutput").val("0.00");
            $("#VaultInput").val("0.00");
            switch (selected) {
                case "eusd":
                    selected = "egr"
                    break;
                case "egr":
                    selected = "eusd"
                    break;
                default:
                    break;
            }
            if ($("#send").html() === send) {
                $("#send").html(receive);
                $("#receive").html(send);
                $("#finalact").html(generate);
            } else {
                $("#send").html(send);
                $("#receive").html(receive);
                $("#finalact").html(redeem);
            }
        }));
    })
    $("#VaultInput").keyup(function() {
        let egrPrice = parseFloat(localStorage.getItem("egrVaultPrice"));
        let amount;
        let outputValue;
        switch (selected) {
            case "eusd":
                amount = parseFloat($("#VaultInput").val());
                outputValue = amount / egrPrice;
                $("#VaultOutput").val(outputValue);
                break;
            case "egr":
                amount = parseFloat($("#VaultInput").val());
                outputValue = egrPrice * amount;
                $("#VaultOutput").val(outputValue);
                break;
            default:
                break;
        }
    });
</script>