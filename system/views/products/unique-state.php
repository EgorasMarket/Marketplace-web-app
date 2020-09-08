<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>

<style>
  .card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden; }
  .card-product .price-new, .card-product .price {
    margin-right: 5px; }
  .card-product .price-old {
    color: #999; }
  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center; }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover; }
      
      .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px; }
  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .title {
    margin-top: 0; }
</style>

<div class="container mt-2" id="topBanner">
  <div class="row">
    <div class="col-md-12 reset-padding " style="">
      <div class="row mt-3">
        
        <div class="col-md-12 reset-padding">
          <div class="col-sm-12 ">
            <ul class="list-group">
            <div class="row">
                
<?php
$rs = json_decode($data['response']['data'], true);

// echo "<pre>";

// var_dump($rs);
// echo "</pre>";


if ($rs == NULL) {
?>
                <div class="col-md-12">
                    <li style="border:none;" class="list-group-item mb-4">
                        
                            <div class="media align-items-lg-center flex-column flex-lg-row">
                                <div class="media-body order-2 order-lg-1">
                                    <div class="row align-items-center">
                                        <img style="height:70%;" src="/public/static/assets/company/abbreviation.png" class="img-fluid mx-auto" >
                                    </div>
                                    <h6 class="mt-0 font-weight-bold my-2 text-muted text-center">No listing for this state is available.</h6>
                                </div>
                            </div>
                        
                    </li> 
                    
                </div>
<?php
} else {
    
    foreach ($rs as $key => $value) {
        $id = $value['id'];
        $walletId = $value['walletId'];
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

        // echo $walletId;
     
        $phone_name = $brand." ".$model;

?>

                <div class="col-md-4">
                    <figure class="card card-product">
                        <div class="img-wrap"> 
                            <img src="/public/static/phones/<?php echo $img; ?>">
                            <!-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> -->
                        </div>
                        <figcaption class="info-wrap">
                            <h6 class="title text-dots"><a href="#"><?php echo $phone_name ?></a></h6>
                            <div class="action-wrap">
                                <a href="/phone_item/<?php echo $slug; ?>" class="btn btn-orange btn-sm float-right"> Sell Now <i class="fas fa-arrow-right"></i></a>
                                <div class="price-wrap h5">
                                    <span class="price-new"><?php echo sniajaFormat($price) ?></span>
                                    <!-- <del class="price-old">$1980</del> -->
                                </div> <!-- price-wrap.// -->
                            </div> <!-- action-wrap -->
                        </figcaption>
                    </figure>
                </div>

<?php
     
    }

}
?>

            </div>
            </ul> 
          </div>
        </div>
      </div>
      <!-- <nav aria-label="Page navigation">
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
        </nav> -->
    </div>
  </div>
</div>

  
<?php require_once("public/page-parts/site-footer.php") ?>