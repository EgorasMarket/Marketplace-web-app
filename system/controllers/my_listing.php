<?php 
    class My_listing extends Controller
    {
    
        public function index()
        {
            if (isset($_COOKIE['walletId'])) {
                $walletId = $_COOKIE['walletId'];
            }

            $param = new stdClass();
            $object = new stdClass();

            $param->walletId = $walletId;

        
            $object->name = "fetch_listings_by_walletId";
            $object->param = $param;

            $form_data  = json_encode($object);

            
            $response = curl_without_auth($form_data);

            $res = json_decode($response, true);
            // var_dump($response);

            // die();

            $this->view('account/my-listing', $res);
        }
    
    }
?>