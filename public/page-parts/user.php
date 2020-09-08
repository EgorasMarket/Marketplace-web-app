<?php
if (!isset($_COOKIE['walletId'])) {
    // $walletId = $_COOKIE['walletId'];
?>
    <li class="nav-item" id="logoutInUserLink">
        <a class="nav-link text-dark btn btn-warning btn-sm" href="#" id="connectWalletModalbtn" data-toggle="modal" data-target="#connectWalletModal"><i class="fas fa-wallet"></i> <span class="mobileHideIt">Wallet</span></a>
    </li>
<?php
} else {
?>
    <li class="nav-item dropdown" id="loginInUserLink">
        <a class="nav-link dropdown-toggle btn btn-warning btn-sm" href="#" style="position:relative" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user" style="position:relative"></i><span class="mobileHideIt"> Account </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/my_account/"><i class="fas fa-user-alt mr-1"></i> My Account</a>
            <a class="dropdown-item" href="/orders/"><i class="fas fa-box mr-1"></i> Orders</a>
            <!-- <a class="dropdown-item" href="/wallet/"><i class="fas fa-wallet mr-1"></i> Wallet</a> -->
            <a class="dropdown-item" href="/my_listing/"><i class="fas fa-business-time mr-1"></i> My Listings</a>
            <a class="dropdown-item" href="/messages/"><i class="far fa-comments mr-1"></i> Messages</a>
            <a class="dropdown-item" href="/vault/"><i class="fas fa-shield-alt mr-1"></i> Vault</a>
            <hr>
            <a class="dropdown-item" href="/logout/"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
        </div>
    </li>
<?php
}
?>