<!-- All Brand Modal -->
<div class="modal fade" id="allBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog brand-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Brands</h5>
                <!-- <div class="input-group brand-search">
                    <div class="input-group-prepend search-icon">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Start type here" aria-label="Username" aria-describedby="basic-addon1">
                </div> -->
            </div>
            <div class="modal-body">
                <div class="row" id="allbrand">
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="approveModalLabel">Approve</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">

                    <label>Enter amount you want this <b>app</b> to spend.</label>
                    <input class="form-control" type="number" id="approvalAmount" placeholder="Enter Amount">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" onclick="App.approveApp(); return false;">Approve</button>
                </div>
            </div>
        </div>
    </div>
</div>
<button id="openApproveVaultModal" data-toggle="modal" data-target="#approveVaultModal" style="display: none;">
</button>
<!-- Modal -->
<div class="modal fade" id="approveVaultModal" tabindex="-1" role="dialog" aria-labelledby="approveVaultModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="approveVaultModalLabel">Approve</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">

                    <label>Enter amount you want this <b>vault</b> to spend.</label>
                    <input class="form-control" type="number" id="approvalVaultAmount" placeholder="Enter Amount">
                    <input type="hidden" id="whichCoin">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" onclick="App.approveVaultApp(); return false;">Approve</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" style="background: rgba(0,0,0, 0.8);" id="txtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <button id="txtModalClose" style="float: right; margin-right: 10px; margin-top: 10px;"><i class="fas fa-times fa-2x text-white"></i></button>

    <div class="modal-dialog" role="document" style="background: transparent;">
        <div class="modal-content" style="background: transparent; border: none;">

            <div class="modal-body" style="background: transparent;">
                <div id="loaderDiv">
                    <div class="loader"></div>
                    <p class="text-center text-white action-txt">Initiating transaction please wait...</p>

                </div>

                <div id="rsInfo" style="display:none; text-align: center; background: rgba(255,255,255, 0.8); border-radius: 5px;">



                </div>

            </div>

        </div>
    </div>

</div>



<!-- All Country Modal -->
<div class="modal fade" id="allCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog brand-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Your Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="supplycountry">
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>


<a class="" id="trigState" href="#" style="display:none" data-toggle="modal" data-target="#allStates">All States</a>
<!-- All State Modal -->
<div class="modal fade" id="allStates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog state-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Your State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="supplystate">
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>


<!-- All Brand Modal -->
<div class="modal fade" id="connectWalletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog wallet-modal" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:none">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-width: 300px; background: white;">

                <div class="text-center">
                    <img src="/public/static/assets/company/egoras-face.png" width="70" alt="Logo" srcset="" class="img-fluid wallet-logo">
                    <h5 class="mt-3 mb-0">Connect Wallet</h5>
                    <p class="font-weight-bold">To start using Egoras</p>
                </div>
                <div style="text-align: center" id="spinnerLoader">
                    <div class="loader"> </div>
                    <p>Please wait...</p>
                </div>
                <div id="loginBtns">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <button style="width: 100%; outline: none;" id="Fortmatic" onclick="enableWalletProviderFromModal(this.id)">
                                <div class="media mx-4">
                                    <img src="/public/static/assets/logos/fortmatic.png" width="50" alt="Logo" srcset="" class="img-fluid left">
                                    <div class="media-body">
                                        <p class="font-weight-bold ml-4" style="text-align: left;">Fortmatic <small>(Recommended)</small></p>
                                    </div>
                                    <img src="/public/static/assets/company/arrowright.png" width="40" alt="Logo" srcset="" class="img-fluid">
                                </div>
                            </button>
                            <h6 class="text-center">OR</h6>
                            <button style="width: 100%; outline: none;" id="Metamask" onclick="enableWalletProviderFromModal(this.id)">
                                <div class="media mx-4">
                                    <img src="/public/static/assets/company/metamask.png" width="50" alt="Logo" srcset="" class="img-fluid left">
                                    <div class="media-body">
                                        <p class="font-weight-bold ml-4" style="text-align: left;">Metamask</p>
                                    </div>
                                    <img src="/public/static/assets/company/arrowright.png" width="40" alt="Logo" srcset="" class="img-fluid">
                                </div>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- <div class="text-center my-3">
        <button type="button" class="btn btn-light">Create Wallet</button>
        <button type="button" class="btn btn-light">Import Wallet</button>
        </div> -->
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>


<!-- All Waitlist Modal -->
<div class="modal fade" id="WaitlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog Waitlist-modal" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:none">
                <!-- <h6 class="text-center">Join Waitlist</h6> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Join Over 22,000 Users!</h2>
                <h6 class="text-center">Signing up will put you on the waitlist to start using our recommerce marketplace and earn smart incentives for every purchase done on the platform. Sign up below to refer your friends and get your chance of winning 5000 EGR tokens.</h6>
                <div id="success-msg"></div>
                <div class="mt-3" id="listbody">
                    <form id="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address">
                        </div>
                        <input type="submit" id="waitlist-button" class="btn btn-orange btn-block" value="Join">
                    </form>
                </div>

                <!-- <div class="text-center my-3">
        <button type="button" class="btn btn-light">Create Wallet</button>
        <button type="button" class="btn btn-light">Import Wallet</button>
        </div> -->
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary btn-lg" style="display: none;" id="sendTokenBtn" data-toggle="modal" data-target="#sendToken"></button>

<div class="modal  fade" id="sendToken" tabindex="-1" role="dialog" aria-labelledby="sendTokenLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="sendTokenLabel">Send <span id="sendCoinName"></span></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">
                    <label>Wallet Address</label>
                    <input class="form-control" type="text" placeholder="Enter wallet address" id="sendTokenAddress" />
                    <label>Amount</label>
                    <input class="form-control" type="number" placeholder="Enter amount" id="sendTokenAmount" />
                    <input class="form-control" type="hidden" id="sendTokenWhich" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="App.sendOutToken()" class="btn btn-warning">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/static/js/use-country.js"></script>
<script src="/public/static/js/supply-state.js"></script>