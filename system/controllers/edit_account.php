<?php 
    class Edit_account extends Controller
    {
    
        public function index()
        {
            // var_dump($_POST);
            $success = array();
            $error = array();
            $data = array();

            // print_r($_POST);
            if (isset($_COOKIE['walletId'])) {
                $walletId = $_COOKIE['walletId'];
            }

            
            if (isset($_POST['first_name']) && 
            isset($_POST['email']) && 
            isset($_POST['last_name']) && 
            isset($_POST['state']) && 
            isset($_POST['address'])) {
                $first_name = $_POST['first_name'];
                $email = $_POST['email'];
                $last_name = $_POST['last_name'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $address = $_POST['address'];

                $split = explode("_",$country);
                $country_name = $split[0];

            } 
            
        
            if (empty($first_name) || 
            empty($email) || 
            empty($last_name) || 
            empty($country) || 
            empty($state) || 
            empty($address)) {
                $error["msg"] = "Please provide all required information";
                $data["error"] = $error;
            }else {


                $param = new stdClass();
                $object = new stdClass();
        
                $param->walletId = $walletId;
                $param->first_name = $first_name;
                $param->email = $email;
                $param->last_name = $last_name;
                $param->country = $country_name;
                $param->state = $state;
                $param->address = $address;
                
                
        
                $object->name = "edit_user_info";
                $object->param = $param;
        
                $form_data  = json_encode($object);
        
                // echo $form_data;
                // print_r($object);
                
        
                $response = curl_without_auth($form_data);
                
                
        
                
                if (empty($response)) {
                    $error["msg"] = "Can't complete your request at the moment.";
                    $data["error"] = $error;
                } else {
                    $rs =  json_decode($response,  true);
                
                    if(isset($rs['error'])){
                            $error["msg"] = $rs['error']['message'];
                            $data["error"] = $error;
                    }else if(isset($rs['response'])){
                    //time()+3600
                    $success["msg"] = $rs['response']['data']['message'];
                        $success["status"] = "OK";
                        $data["success"] = $success;
                    
                    
                    }
                    
                } 
            }

            echo json_encode($data);

        }
        
    }
?>