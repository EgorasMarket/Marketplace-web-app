<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>

<style>

</style>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container-fluid mt-2" id="topBanner">
  <div class="row">
    <div class="col-md-12 ">
      <div class="row mt-3">
        <div class="col-md-2">
            <div class="bg-white products-spec">
                <ul class="mx-0" style="list-style-type: none;">
                    <a href="/my_account/"><li class="pl-2"><p class=""><i class="fas fa-user-alt mr-1"></i> My Account</p></li></a>
                    <a href="/orders/"><li class="pl-2"><p class=""><i class="fas fa-box mr-1"></i> Orders</p></li></a>
                    <!-- <a href="/wallet/"><li class="pl-2"><p class=""><i class="fas fa-wallet mr-1"></i> Wallet</p></li></a> -->
                    <a href="/my_listing/"><li class="pl-2"><p class=""><i class="fas fa-business-time mr-1"></i> My Listings</p></li></a>
                    <a href="/messages/"><li class="pl-2 bg-gray"><p class=""><i class="far fa-comments mr-1"></i> Messages</p></li></a>
                    <a href="/vault/"><li class="pl-2 border-bottom"><p class=""><i class="fas fa-shield-alt mr-1"></i> Vault</p></li></a>
                    <!-- <a href=""><li><p class="font-weight-bold"><i class="fas fa-business-time mr-1"></i> Egoras Earnings</p></li></a> -->
                    <a href=""><li><p class="font-weight-bold text-warning text-center"> LOGOUT</p></li></a>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="bg-white products-spec mb-3">
            <div class="messaging">
      <div class="inbox_msg">
        <div class="p-2 border-bottom">
          <?php  
            if (isset($_COOKIE['slug'])) {
              $slug = $_COOKIE['slug'];
            }

            $product = str_replace(".html","", $slug);
            $header = str_replace("-"," ", $product);
            // echo $product;
          ?>
          <p class="text-muted">Product:</p>
          <a href="/phone_item/<?php echo $slug; ?>"><h6 class="text-capitalize"><?php echo $header; ?></h6></a>
        </div>
        <div class="mesgs">
          <div id="msg_history" class="msg_history list">
              <?php 
                if (isset($_COOKIE['walletId'])) {
                    $walletId = $_COOKIE['walletId'];
                }
                
                foreach ($data as $key => $value) {
                  
                  $seller = $value['seller'];
                  $product_slug = $value['product_slug'];
                  $message = $value['message'];
                  $date_created = $value['date_created'];
                  // echo $product_slug;
                  $formatDate = date("D, d M Y", strtotime($date_created));

                  if ($walletId == $seller) {

              ?>
                <div class="21/12/2019" style="margin: 26px 0 26px;overflow:hidden;">
                  <div class="sent_msg">
                    <p><?php echo $message; ?></p>
                    <span class="time_date"> <?php echo $formatDate; ?></span> </div>
                </div>
              <?php
              
                  } else {
              ?>
                <div class="16/12/2019">
                  <!-- <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div> -->
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p><?php echo $message; ?></p>
                      <span class="time_date"> <?php echo $formatDate; ?></span></div>
                  </div>
                </div>
              <?php
                  }
                  
                }
              ?>

          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                <form id="reply-message">
                    <input type="hidden" name="reply_to" value="<?php echo $id; ?>" />
                    <input type="hidden" name="product_slug" value="<?php echo $product_slug; ?>" />
                    <input type="hidden" name="seller" value="<?php echo $seller; ?>" />
                    <input type="text" name="message" id="message1" class="write_msg pr-5" placeholder="Type a message" />
                    <button id="replyb" class="msg_send_btn" type="submit"><i class="far fa-paper-plane" aria-hidden="true"></i></button>
                </form>
            </div>
          </div>
        </div>
      </div>
      
      
      
    </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
<?php require_once("public/page-parts/site-footer.php") ?>
<!-- <script src="/public/static/js/sort-messages.js"></script> -->
<script src="/public/static/js/reply-message.js"></script>

<script>
  $(document).ready(function () {
    $("#msg_history").animate({ 
      scrollTop: $( 
        '#msg_history').get(0).scrollHeight 
    }, 2000); 
    
    $("#replyb").on('click',(function () {
      $("#msg_history").animate({ 
        scrollTop: $( 
          '#msg_history').get(0).scrollHeight 
      }, 2000); 
      function explode(){
        $("#message1").val('');
      }
      setTimeout(explode, 2000);
    }))
  });
</script>