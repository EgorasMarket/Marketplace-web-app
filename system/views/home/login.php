<?php require_once("public/page-parts/site-header.php") ?>


<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="log-in bg-white mt-5">

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
                            <button style="width: 100%; outline: none;" id="Fortmatic" onclick="enableWalletProvider(this.id)">
                                <div class="media mx-4">
                                    <img src="/public/static/assets/logos/fortmatic.png" width="50" alt="Logo" srcset="" class="img-fluid left">
                                    <div class="media-body">
                                        <p class="font-weight-bold ml-4" style="text-align: left;">Fortmatic <small>(Recommended)</small></p>
                                    </div>
                                    <img src="/public/static/assets/company/arrowright.png" width="40" alt="Logo" srcset="" class="img-fluid">
                                </div>
                            </button>
                            <h6 class="text-center">OR</h6>
                            <button style="width: 100%; outline: none;" id="Metamask" onclick="enableWalletProvider(this.id)">
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

            </div>
        </div>
    </div>
</div>


</div>
</div>
<div class="overlay"></div>




<script src="/public/static/js/app.js"></script>
<script src="/public/static/js/checklogin.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

</body>

</html>