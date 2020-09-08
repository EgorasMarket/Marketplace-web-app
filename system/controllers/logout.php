<?php
class Logout extends Controller
{

  public function index()
  {
    $cookie_name = 'walletId';
    unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
   $res = setcookie($cookie_name, '', time() - 259200, '/');

   header("Location: /");
  }
}