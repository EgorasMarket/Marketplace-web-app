<?php 
    class Messages extends Controller
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
            // $param->walletId = $walletId;

        
            $object->name = "fetch_all_message";
            $object->param = $param;

            $form_data  = json_encode($object);
                
            
                
            $response = curl_without_auth($form_data);

            $res = json_decode($response, true);

            $this->view('account/my-messages', $res);
        }
    
    }
?>