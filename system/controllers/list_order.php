<?php 
    class List_order extends Controller
    {
    
        public function index()
        {

	    	if (isset($_COOKIE['walletId'])) {
	            $walletId = $_COOKIE['walletId'];
	        } else {
	        	$walletId = "unset";
	        }

	        $param = new stdClass();
	        $object = new stdClass();

	        $param->walletId = $walletId;


	        $object->name = "check_user_details";
	        $object->param = $param;

	        $form_data  = json_encode($object);


	        $response = curl_without_auth($form_data);

	        $res = json_decode($response, true);
	        

	        if (!isset($_COOKIE['walletId'])) {
	        	$this->view('home/login');
	        } else if ($res['response']['data'] == false) {
	        	$this->view('account/redirect');
	        } else if ($res['response']['data'] == true) {
	        	$this->view('account/list-order');
	        }
            
        }
    
    }
?>