<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container mt-2" id="topBanner">
  <div class="row">
    <div class="col-md-12 reset-padding " style="">
      <div class="row mt-3">
        <div class="col-md-3 desktop-side-link">
            <div class="bg-white p-3 products-spec mb-3">
                <form id="sort" action="/phones/filter" method="get">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Brand</label>
                        <select class="form-control" onchange="changeBrand(value);" name="brand" id="brand">
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Model</label>
                        <select class="form-control" name="model" id="model">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Condition</label>
                        <select class="form-control" name="condition">
                            <option value="">Select Condition</option>
                            <option>Used</option>
                            <option>New</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">RAM</label>
                        <select class="form-control" name="ram">
                            <option value="">Select RAM</option>
                            <option>512 MB </option>
                            <option>1 GB </option>
                            <option>2 GB </option>
                            <option>3 GB </option>
                            <option>4 GB </option>
                            <option>6 GB </option>
                            <option>8 GB </option>
                            <option>12 GB </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Storage Capacity</label>
                        <select class="form-control" name="storage">
                            <option value="">Select Storage Capacity</option>
                            <option>4 GB</option>
                            <option>8 GB</option>
                            <option>16 GB</option>
                            <option>32 GB</option>
                            <option>64 GB</option>
                            <option>128 GB</option>
                            <option>256 GB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Screen Size</label>
                        <select class="form-control" name="scrnSize">
                            <option value="">Select Screen Size</option>
                            <option value="< 4-inches">&lt; 4 inches</option>
                            <option value="4.5-inches">4-5 inches</option>
                            <option value="5.5-inches">5.1-6 inches</option>
                            <option value="6.1 > inches">6.1 &gt; inches</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bold">Colour</label>
                        <select class="form-control" name="colour">
                            <option value="">Select Colour</option>
                            <option>Black</option>
                            <option>Blue</option>
                            <option>Gold</option>
                            <option>Gray</option>
                            <option>Green</option>
                            <option>Pink</option>
                            <option>Red</option>
                            <option>Silver</option>
                            <option>White</option>
                            <option>Yellow</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-orange btn-block">Apply Filter</button>
                </form>
            </div>
        </div>
        <div class="col-md-9 reset-padding">
          <div class="col-sm-12 ">
            <ul class="list-group">
<?php
$rs = json_decode($data['response']['data'], true);

// echo "<pre>";

// var_dump($rs);
// echo "</pre>";


if ($rs == NULL) {
?>
                <li class="list-group-item mb-4">
                    
                        <div class="media align-items-lg-center flex-column flex-lg-row">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2 text-center">You have no buy order</h5>
                                <p class="font-italic text-muted mb-0 text-center">Please add a buy order</p>
                                
                            </div>
                        </div>
                    
                </li> 
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

                <li class="list-group-item mb-4 products-items">
                    
                    <a href="/phone_item/<?php echo $slug; ?>">
                        <div class="media align-items-lg-center flex-column flex-lg-row">
                            <img src="/public/static/phones/<?php echo $img; ?>" alt="Generic placeholder image" width="100" class="mr-3 order-lg-1">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2"><?php echo $phone_name; ?> (<?php echo $colour.", ".$storage_capacity; ?>)</h5>
                                <p class="font-italic text-muted mb-0 "><?php echo $storage_capacity; ?> ROM | <?php echo $screen_size; ?> Display <?php echo $main_camera; ?> Rear Camera | <?php echo $selfie_camera; ?> Front Camera A12 Bionic Chip Processor</p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2"><?php echo sniajaFormat($price) ?></h6>
                                    <!-- <ul class="list-inline small">
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </a> 
                    
                </li> 

<?php
     
    }

}
?>

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
<script src="/public/static/js/filter-supply.js"></script>