<?php 
    class My_account extends Controller
    {
    
        public function index()
        {
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
            $res = json_decode($response, true);

            $this->view('account/my-account', $res['response']['data']);
        }
    
    }
?>