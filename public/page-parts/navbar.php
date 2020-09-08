<style>
    .dropdown-menu {
        left: -55%;
    }

    .dropdown-item {
        padding: .25rem 15px;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top products-spec navbar-light">
    <div class="container-fluid">
        <a href="/"> <img src="/public/static/assets/company/logo.png" alt="Logo" style="width: 150px;" class="img-fluid"></a>
        <!-- Custom rounded search bars with input group -->
        <form id="topSearchBar" action="/phones_result" method="get">
            <div class="p-1 bg-light rounded rounded-pill  ">
                <div class="input-group">
                    <input type="search" name="search_input" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                    <div class="input-group-append">
                        <button id="button-addon1" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>



        </form>
        <button class="d-inline-block d-lg-none ml-auto btn btn-warning" type="button" id="sidebarCollapse" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <!-- End -->
        <div id="userWalletAccount">

            <?php
            require "public/page-parts/otherLink.php";
            ?>
            <?php
            require "public/page-parts/user.php";
            ?>


        </div>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="nav navbar-nav ml-auto">
                <!-- <form class="form-inline my-2 my-lg-0" action="/phones_result" method="get">
                    <div class="input-group brand-search mr-2">
                        <div class="input-group-prepend search-icon">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search Phone" name="search_input" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-orange nav-btn my-2 my-sm-0" type="submit">Search</button>
                </form> -->

                <?php
                require "public/page-parts/otherLink.php";
                ?>


                <!-- <li class="nav-item">
                    <a class="nav-link text-dark" href="#" style="position:relative"><i class="fas fa-bell" style="position:relative"><span class="badge1">4</span></i> Notification</a>
                </li> -->
                <?php
                require "public/page-parts/user.php";
                ?>

            </ul>
        </div>
    </div>
</nav>