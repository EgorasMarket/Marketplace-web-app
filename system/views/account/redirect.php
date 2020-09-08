<?php require_once("public/page-parts/site-header.php") ?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="log-in bg-white mt-5 py-5">
                <p class="text-center font-weight-bold">Please complete your registration process <a class="text-success" href="/my_account">here</a> by providing your information, to be able to list a product.</p>
            </div>
        </div>
    </div>
</div>


</div>
</div>
<div class="overlay"></div>




<script src="/public/static/js/app.js"></script>
<!-- <script src="/public/static/js/checklogin.js"></script> -->
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