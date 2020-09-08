<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/wallet-cookie.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<div class="container-fluid mt-2" id="topBanner">
    <div class="row mt-3">
        <div class="col-md-2 ">
            <div class="bg-white products-spec">
                <ul class="mx-0" style="list-style-type: none;">
                    <a href="/my_account/"><li class="pl-2"><p class=""><i class="fas fa-user-alt mr-1"></i> My Account</p></li></a>
                    <a href="/orders/"><li class="pl-2"><p class=""><i class="fas fa-box mr-1"></i> Orders</p></li></a>
                    <a href="/wallet/"><li class="pl-2 bg-gray"><p class=""><i class="fas fa-wallet mr-1"></i> Wallet</p></li></a>
                    <a href="/my_listing/"><li class="pl-2"><p class=""><i class="fas fa-business-time mr-1"></i> My Listings</p></li></a>
                    <a href="/messages/"><li class="pl-2"><p class=""><i class="far fa-comments mr-1"></i> Messages</p></li></a>
                    <a href="/vault/"><li class="pl-2 border-bottom"><p class=""><i class="fas fa-shield-alt mr-1"></i> Vault</p></li></a>
                    <!-- <a href=""><li><p class="font-weight-bold"><i class="fas fa-business-time mr-1"></i> Egoras Earnings</p></li></a> -->
                    <a href=""><li><p class="font-weight-bold text-warning text-center"> LOGOUT</p></li></a>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-white">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3">
                            <h5 class="text-center">Wallet Balance</h5>
                            <h2 class="text-center mb-3">&#8358;0</h2>
                            <button type="button" class="btn btn-outline-dark btn-block">Deposit</button>
                            <button type="button" class="btn btn-outline-dark btn-block mb-2">Withdraw</button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <nav>
                            <div class="nav nav-tabs wallet-tab" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ALL</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">RECEIVED</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">SENT</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Asset</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Asset</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Received</td>
                                            <td>2591.66</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Asset</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                        <tr>
                                            <td >2019-11-19</td>
                                            <td>
                                                <span class="">GOR</span><br>
                                            </td>
                                            <td>Sent</td>
                                            <td>2591.66</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-white products-spec">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Assets</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Send</th>
                            <th scope="col">Unlock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <span class="font-weight-bold">GOR</span><br>
                                <span>USD</span>
                            </td>
                            <td class="text-center">
                                <span class="font-weight-bold">0.000</span><br>
                                <span>&#36;0.00</span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-light"><i class="fas fa-share"></i></button>
                            </td>
                            <td class="text-center">
                                <div class="switchToggle">
                                    <input type="checkbox" id="switch1">
                                    <label for="switch1">Toggle</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <span class="font-weight-bold">EGR</span><br>
                                <span>USD</span>
                            </td>
                            <td class="text-center">
                                <span class="font-weight-bold">0.000</span><br>
                                <span>&#36;0.00</span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-light"><i class="fas fa-share"></i></button>
                            </td>
                            <td class="text-center">
                                <div class="switchToggle">
                                    <input type="checkbox" id="switch2">
                                    <label for="switch2">Toggle</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="text-center">
                    <p class="text-center"><button type="button" class="btn btn-light btn-round">INSTANT PAYOUT</button></p> 
                    <h2>8.02911</h2>
                    <p>Ipsum fugiat quis ipsum sit aute nostrud ullamco.</p>
                    <p>Ipsum fugiat quis ipsum sit aute nostrud ullamco in anim enim exercitation voluptate sint.</p>
                    <button type="button" class="btn btn-orange mb-2">List And Earn</button>
                </div>
            </div>
            <div class="bg-white">
                
            </div>
        </div>
    </div>
</div>


  
<?php require_once("public/page-parts/site-footer.php") ?>