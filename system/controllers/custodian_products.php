<?php
class Custodian_products extends Controller
{
    public function index()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_POST['cus_id'])) {
            $walletId = $_POST['cus_id'];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->walletId = $walletId;

    
        $object->name = "fetch_custodian_gadgets";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

}