<?php
class Account_details extends Controller
{
    public function index()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_COOKIE['walletId'])) {
            $walletId = $_COOKIE['walletId'];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->walletId = $walletId;

    
        $object->name = "fetch_custodian_details";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }


    public function buyer_details()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_COOKIE['custodian'])) {
            $walletId = $_COOKIE['custodian'];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->walletId = $walletId;

    
        $object->name = "fetch_custodian_details";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

}