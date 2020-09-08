<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>

<style>
.m-design {
    background-color: #f5f5f5;
    box-shadow: none;
    color: #565656;
    font-family: 'Rubik', sans-serif;
    font-size: 1rem;
    line-height: 1.43;
    /* min-height: 3.5em; */
    padding-top: 0.375rem;
    padding-right: 40px;
    padding-bottom: 0.375rem;
    padding-left: 0.75rem;
}

.form-control:focus {
    box-shadow: none;
}

.msg_send_btn {
    right: 5px;
    top: 55px;
}
</style>

<div class="mt-2" id="topBanner">
    <div class="wrapper">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav class="" role="navigation" aria-label="breadcrumbs">
                                    <!-- <ul class="breadcrumb-list">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Sport & Outdoor</a><span>Lorem Ipsum is simply dummy text</span></li>
                                    </ul> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $rs = json_encode($data[0], true);

        // echo "<pre>";

        // var_dump($data[0]);
        // echo "</pre>";

        // die();
        $walletId = $data[0]['walletId'];
        $brand = $data[0]['brand'];
        $condition = $data[0]['d_condition'];
        $storage_capacity = $data[0]['storage_capacity'];
        $screen_size = $data[0]['screen_size'];
        $selfie_camera = $data[0]['selfie_camera'];
        $main_camera = $data[0]['main_camera'];
        $model = $data[0]['model'];
        $ram = $data[0]['ram'];
        $colour = $data[0]['colour'];
        $operaing_system = $data[0]['operaing_system'];
        $sim = $data[0]['sim'];
        $card_slot = $data[0]['card_slot'];
        $battery = $data[0]['battery'];
        $description = $data[0]['description'];
        $price = $data[0]['price'];
        $slug = $data[0]['slug'];
        $state = $data[0]['state'];
        $img = $data[0]['img'];
        $img2 = "";
        $img3 = "";
        $img4 = "";
        $img5 = "";

        $stlLink = "/public/static/phones/";
        
        if(!empty($data['img2'])){
            $img2 =  $stlLink.$data[0]['img2'];
        }
        if(!empty($data['img3'])){
            $img3 =  $stlLink.$data[0]['img3'];
        }
        if(!empty($data['img4'])){
            $img4 =  $stlLink.$data[0]['img4'];
        }
        if(!empty($data['img5'])){
            $img5 =  $stlLink.$data[0]['img5'];
        }


        // Samsung Galaxy S9 5.8-inch QHD (4GB, 64GB ROM) Android 8.0 Oreo, 12MP + 8MP single SIM 4G smartphone - Midnight Black
        $product_info = $brand . " " . $model . " " . $screen_size . " (" . $ram . " RAM, " . $storage_capacity . " ROM) " . $operaing_system . ", " . $main_camera . " + " . $selfie_camera . " " . $sim . " smartphone - " . $colour;
        ?>
        <input type="hidden" id="phoneData" value="<?php echo htmlspecialchars(json_encode($data[0]), ENT_QUOTES, 'UTF-8'); ?>" />
        <main class="bg-white pt-2 mb-1">
            <div id="shopify-section-product-template" class="shopify-section">
                <div class="single-product-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6  col-sm-12">
                                        <div class="product-details-large" id="ProductPhoto">
                                            <img id="ProductPhotoImg" class="product-zoom img-fluid" data-image-id="" alt="" data-zoom-image="/public/static/phones/<?php echo $img; ?>" src="/public/static/phones/<?php echo $img; ?>">

                                        </div>
                                        <div id="ProductThumbs" class="product-thumbnail owl-carousel">
                                            <a class="product-single__thumbnail active" href="/public/static/phones/<?php echo $img; ?>" data-image="/public/static/phones/<?php echo $img; ?>" data-zoom-image="/public/static/phones/<?php echo $img; ?>" data-image-id="6995357106246">
                                                <img src="/public/static/phones/<?php echo $img; ?>" alt=""></a>

                                            <a class="product-single__thumbnail active" href="<?php echo $img2; ?>" data-image="<?php echo $img2; ?>" data-zoom-image="<?php echo $img2; ?>" data-image-id="6995357106246">
                                                <img src="<?php echo $img2; ?>" alt=""></a>

                                            <a class="product-single__thumbnail active" href="<?php echo $img3; ?>" data-image="<?php echo $img3; ?>" data-zoom-image="<?php echo $img3; ?>" data-image-id="6995357106246">
                                                <img src="<?php echo $img3; ?>" alt=""></a>

                                            <a class="product-single__thumbnail active" href="<?php echo $img4; ?>" data-image="<?php echo $img4; ?>" data-zoom-image="<?php echo $img4; ?>" data-image-id="6995357106246">
                                                <img src="<?php echo $img4; ?>" alt=""></a>

                                            <a class="product-single__thumbnail active" href="<?php echo $img5; ?>" data-image="<?php echo $img5; ?>" data-zoom-image="<?php echo $img5; ?>" data-image-id="6995357106246">
                                                <img src="<?php echo $img5; ?>" alt=""></a>



                                        </div>
                                    </div>
                                    <div class="col-md-6  col-sm-12">
                                        <div class="single-product-content">
                                            <form method="post" id="AddToCartForm" accept-charset="UTF-8" class="shopify-product-form" enctype="multipart/form-data">
                                                <input type="hidden" name="form_type" value="product" /><input type="hidden" name="utf8" value="✓" />
                                                <div class="product-details">
                                                    <div class="product-info m-0 p-0 font-weight-bold">
                                                        <?php echo $product_info; ?>
                                                    </div>

                                                    <!-- <h1 class="single-product-name">Lorem Ipsum is simply dummy text</h1> -->
                                                    <div class="single-product-reviews">
                                                        <span class="shopify-product-reviews-badge" data-id="1912078270534"></span>
                                                    </div>
                                                    <div class="product-sku">Condition : <span class="variant-sku"><?php echo $condition; ?></span></div>
                                                    <div class="single-product-price">
                                                        <div class="product-discount"><span class="price" id="ProductPrice"><span> <?php echo sniajaFormat($price); ?></span></span></div>
                                                        <!-- <p><span class="clash-price">&#8358; 530,000</span> <mark class="text-warning">-75%</mark></p> -->

                                                    </div>

                                                    <div class="single-product-action">
                                                        <div class="product-variant-option">
                                                            <select name="id" id="productSelect" class="product-single__variants" style="display:none;">
                                                                <option selected="selected" data-sku="YQT71020193" value="19506517377094">Default Title - <span class=money>$20.66 USD</span></option>

                                                            </select>
                                                            <script>
                                                                jQuery(function() {
                                                                    jQuery('.swatch :radio').change(function() {
                                                                        var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
                                                                        var optionValue = jQuery(this).val();
                                                                        jQuery(this)
                                                                            .closest('form')
                                                                            .find('.single-option-selector')
                                                                            .eq(optionIndex)
                                                                            .val(optionValue)
                                                                            .trigger('change');
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                        <style>
                                                            .product-variant-option .selector-wrapper {
                                                                display: none;
                                                            }
                                                        </style>
                                                        <div class="product-add-to-cart">
                                                            <!-- <span class="control-label">Quantity</span>
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                                                            </div> -->
                                                            <div class="text-center mb-3">
                                                                <a href="#" onclick="sellNow()" class="mx-3 btn btn-orange btn-round">Sell Now</a>
                                                                <a href="#" data-toggle="modal" data-target="#ContactBuyer" class="mx-3 btn btn-outline-orange btn-round mt-1">Contact Buyer</a>



                                                            </div>
                                                        </div>
                                                        <div class="secure-payment">
                                                            <!-- <div class="card gold-card">
                                                                <h5 class="text-center"><span class="gold-buyer">Gold Custodian</span></h5>
                                                                <div class="p-3">
                                                                    <h5>Shanzhen YEPO Times Electronics</h5>
                                                                    <p class="mb-1">
                                                                        <span class="country"><img src="/public/static/assets/company/nigeria.png" alt="Generic placeholder image" width="25" class="img-fluid pb-1 pr-1">NGN</span>
                                                                        <span class="years">6<sup>YRS</sup></span><span class="rate ml-1 font-weight-bold">4.5<img src="/public/static/assets/company/star.png" alt="Generic placeholder image" width="22" class="img-fluid pb-1 pl-1"></span>
                                                                        <img src="/public/static/assets/company/star.png" alt="Generic placeholder image" width="22" class="img-fluid">
                                                                        <img src="/public/static/assets/company/star.png" alt="Generic placeholder image" width="22" class="img-fluid">
                                                                        <img src="/public/static/assets/company/star.png" alt="Generic placeholder image" width="22" class="img-fluid">
                                                                        <img src="/public/static/assets/company/star.png" alt="Generic placeholder image" width="22" class="img-fluid">
                                                                        <img src="/public/static/assets/company/rating.png" alt="Generic placeholder image" width="22" class="img-fluid">
                                                                    </p>
                                                                    <p class="mb-1 text-up"><span class="font-weight-bold">290,000+</span> for <span class="font-weight-bold">70</span> transactions</p>

                                                                    <p><span>CN</span><span>6YRS</span><span>4.5</span></p>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3  col-sm-12">
                                
                                <div class="border p-1 mt-2">
                                    <div class="border-bottom">
                                        <h5>Product Location</h5>
                                    </div>
                                    <div class="p-1">
                                        <p class="mb-0 font-weight-bold"><?php echo $state.' State'; ?></p>
                                    </div>
                                </div>
                                <div class="border p-1 mt-2">
                                    <div class="border-bottom">
                                        <p class="font-weight-bold pb-0 p-1">Do you want to buy one?</p>
                                        <span class="pl-1">Click <a class="text-success" href="/list_order">here</a> to list your buy order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .product-details .countdown-timer-wrapper {
                        display: none !important;
                    }
                </style>

                <script>
                    $(document).ready(function() {
                        $('.fancybox').fancybox();
                    });
                </script>
                <script>
                    function productZoom() {
                        $(".product-zoom").elevateZoom({
                            gallery: 'ProductThumbs',
                            galleryActiveClass: "active",
                            zoomType: "inner",
                            cursor: "crosshair"
                        });
                        $(".product-zoom").on("click", function(e) {
                            var ez = $('.product-zoom').data('elevateZoom');
                            $.fancybox(ez.getGalleryList());
                            return false;
                        });

                    };

                    function productZoomDisable() {
                        if ($(window).width() < 767) {
                            $('.zoomContainer').remove();
                            $(".product-zoom").removeData('elevateZoom');
                            $(".product-zoom").removeData('zoomImage');
                        } else {
                            productZoom();
                        }
                    };

                    productZoomDisable();

                    $(window).resize(function() {
                        productZoomDisable();
                    });
                </script>
                <script>
                    $('.product-thumbnail').owlCarousel({
                        loop: true,
                        center: true,
                        nav: true,
                        dots: false,
                        margin: 10,
                        autoplay: false,
                        autoplayTimeout: 5000,
                        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                        item: 3,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 3
                            },
                            992: {
                                items: 3,
                            },
                            1170: {
                                items: 3,
                            },
                            1200: {
                                items: 3
                            }
                        }
                    });
                </script>
            </div>
        </main>

        <!-- Specification section -->
        <div class="mb-3">
            <div class="row mr-0 ml-0 ">
                <div class="col-md-9 bg-white">
                    <div class="bg-white">
                        <div class="card-header bg-white">
                            <h4>Product Specifications</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <!-- <caption>List of users</caption> -->
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Condition</td>
                                        <td class="tb-result"><?php echo $condition ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Brand</td>
                                        <td class="tb-result"><?php echo $brand ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Model</td>
                                        <td class="tb-result"><?php echo $model ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">SIM</td>
                                        <td class="tb-result"><?php echo $sim ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Screen Size</td>
                                        <td class="tb-result"><?php echo $screen_size ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Storage Capacity</td>
                                        <td class="tb-result"><?php echo $storage_capacity ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Card Slot</td>
                                        <td class="tb-result"><?php echo $card_slot ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Main Camera</td>
                                        <td class="tb-result"><?php echo $main_camera ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Selfie Camera</td>
                                        <td class="tb-result"><?php echo $selfie_camera ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Operating System</td>
                                        <td class="tb-result"><?php echo $operaing_system ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Colour</td>
                                        <td class="tb-result"><?php echo $colour ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Battery</td>
                                        <td class="tb-result"><?php echo $battery ?> mAh</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="bg-white">
                        <div class="card-header bg-white">
                            <h4>Product Details</h4>
                        </div>
                        <div class="p-3">
                            <p class="font-weight-bold pb-0">Description:</p>
                            <p style="line-height: 20px"><?php echo $description; ?></p>
                            <!-- <p>Features:</p> -->
                            <!-- <ul class="ml-1" style="list-style-type: none;">
                                <li>- Face and fingerprint unlock</li>
                                <span>The face and fingerprint recognition can make the phone more convenient to use.</span>
                                <li>- Large high-definition screen</li>
                                <span>The phone with 5.71-inch, 720 x 1520 pixels screen can provide you with a great visual effect.</span>
                                <li>- Run fast and store more</li>
                                <span>Equipped with Android 9.0 operating system, MT6761 Cortex-A53 4-core 2.0GHz processor and 3GB RAM and 32GB ROM large memory.</span>
                                <li>- Long standby time and fast charge</li>
                                <span>The built-in 2600mAh lithium-ion battery can be fully charged fast.</span>
                                <li>- Triple cameras</li>
                                <span>8-megapixel and 2-megapixel dual rear cameras and a 5-megapixel front-facing camera can make the phone good at capturing clear images.</span>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="product-small bg-white">
                        <div class="media my-2">
                            <img class="mr-2 img-fluid" src="/public/static/assets/company/phone1.jpg" width="110" alt="Generic placeholder image">
                            <div class="media-body">
                                <p class="m-0 p-0 ">Samsung Galaxy Note...</p>
                                <div class="product-discount"><span class="price" id="ProductPrice"><span class="money">&#8358; 320.660</span></span></div>
                                <p class=""><span class="clash-price">&#8358; 530,000</span> <mark class="text-warning">-75%</mark></p>
                            </div>
                        </div>
                        <div class="mx-3 ">
                            <button type="button" class="btn btn-orange btn-block">SELL NOW</button>
                        </div>
                    </div>

                </div> -->
            </div>
        </div>

        <!-- More items section -->
        <div class="bg-white mb-3">
            <div class="px-4 py-2 border-bottom">
                <h5>More items from this custodian</h5>
            </div>
            <div class="container">
                <div id="custodianproducts" class="row">
                    
                </div>
            </div>
        </div>

        <!-- Sponsored Products section -->
        <div class="bg-white mb-5">
            <div class="px-4 py-2 border-bottom">
                <h5>Related Products</h5>
            </div>
            <div class="container">
                <div id="categoryproducts" class="row">
                    
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Contact Buyer Modal -->
<div class="modal fade" id="ContactBuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message Buyer</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <form id="form21">                 
                        <div class="row">
                            <div class="col-md-3">
                                <div class="py-2" style="background:#f7f7f7;">
                                    <!-- <img src="/public/static/assets/company/star.png" width="50" style="border-radius:50%" class="img-fluid bg-white" alt=""> -->
                                    <div class="row align-items-center"><img style="border-radius:50%;" width="50" src="/public/static/assets/company/star.png" class="img-fluid bg-white mx-auto" ></div>
                                    <p class="text-center text-muted" id="user_name"></p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="hidden" name="buyer" value="<?php echo $walletId; ?>">
                                        <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                                        <textarea type="text" name="seller_msg" class="write_msg form-control m-design" placeholder="Type a message"></textarea>

                                        <button class="msg_send_btn" id="submit_msg" type="submit"><i class="far fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>


<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/contact-buyer.js"></script>
<script src="/public/static/js/custodian-products.js"></script>
<script src="/public/static/js/category-products.js"></script>
<script src="/public/static/js/buyer-details.js"></script>