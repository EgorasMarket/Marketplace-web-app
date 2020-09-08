<?php 
    class Phone_item extends Controller
    {
    
        public function index($slug)
        {
            // echo $id;
            $param = new stdClass();
            $object = new stdClass();

            $param->slug = $slug;

        
            $object->name = "fetch_listings_by_slug";
            $object->param = $param;

            $form_data  = json_encode($object);

            
            
            
            $response = curl_without_auth($form_data);
            // var_dump($response);

            // die();

            $res = json_decode($response, true);

            $pes = $res['response']['data'];

            $walletcookie = $pes[0]['walletId'];
            $sub_category = $pes[0]['sub_category'];

            setcookie("custodian", $walletcookie, time() + 13600, "/");
            setcookie("sub_category", $sub_category, time() + 13600, "/");

            // die();

            $this->view('products/phone-item', $res['response']['data']);
        }
    
    }
?>