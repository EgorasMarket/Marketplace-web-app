<?php 
    class Orders extends Controller
    {
    
        public function index()
        {
            if (isset($_COOKIE['walletId'])) {
                $walletId = $_COOKIE['walletId'];
            }
            $param = new stdClass();
            $object = new stdClass();

            $param->walletId = $walletId;

        
            $object->name = "fetch_order_histroy";
            $object->param = $param;

            $form_data  = json_encode($object);

            
            
            $response = curl_without_auth($form_data);
            // var_dump($response);

            // die();

            $res = json_decode($response, true);
            $this->view('account/my-orders', $res);
        }
    
    }
