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
                    <a href="/logout/"><li><p class="font-weight-bold text-warning text-center"> LOGOUT</p></li></a>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="bg-white products-spec mb-3">
            <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <p class="font-weight-bold">All Conversations</p>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat" id="chatnotification">
          <?php
          $rs = json_decode($data['response']['data'], true);

          if ($rs == NULL) {
          ?>
          <?php
          } else {
            foreach ($rs as $key => $value) {
              $product_slug = $value['product_slug'];
              $message = $value['message'];
              $date_created = $value['date_created'];
              $formatDate = date("D, d M Y", strtotime($date_created));
              $length1 = 50;
              $length2 = 80;
              
              if(strlen($product_slug)>=$length1)
              {
                $slug=substr($product_slug,0,$length1) . '...';
              } else {
                $slug = $product_slug;
              }
              $new = str_replace("-", " ", $slug);

              if(strlen($message)>=$length2)
              {
                $msg=substr($message,0,$length2) . '...';
              } else {
                $msg = $message;
              }


          ?>
            <a href="/unique_message/<?php echo $product_slug ?>">
              <div class="chat_list">
                  <div class="chat_people">
                      <div class="chat_img"> 
                          <!-- <img class="img-fluid" src="https://ptetutorials.com/images/user-profile.png" alt="sunil">  -->
                      </div>
                      <div class="chat_ib">
                          <h5 class="text-capitalize"><?php echo $new ?><span class="chat_date"><?php echo $formatDate ?></span></h5>
                          <p><?php echo $msg ?></p>
                      </div>
                  </div>
              </div>
          </a>

          <?php

            }
          }
          ?>
            
          </div>
        </div>
        <!-- <div class="mesgs">
          <div class="msg_history list">
            <div class="30/12/2019">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="21/12/2019" style="margin: 26px 0 26px;overflow:hidden;">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="29/12/2019">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="31/12/2019" style="margin: 26px 0 26px;overflow:hidden;">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
            <div class="16/12/2019">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>We work directly with our designers and suppliers,
                    and sell direct to you, which means quality, exclusive
                    products, at a price anyone can afford.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="far fa-paper-plane" aria-hidden="true"></i></button>
            </div>
          </div>
        </div> -->
      </div>
      
      
      
    </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/sort-messages.js"></script>