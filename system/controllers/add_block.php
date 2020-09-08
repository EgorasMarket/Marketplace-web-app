<?php 
    class Add_block extends Controller
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
            
            $id = $_POST['main_id'];


            $param = new stdClass();
            $object = new stdClass();
    

            $param->id = $id;
            $param->walletId = $walletId;
            
    
            $object->name = "add_to_blockchain";
            $object->param = $param;
    
            $form_data  = json_encode($object);
    
            //  echo $form_data;
            // print_r($object);
            
    
            $response = curl_without_auth($form_data);
            
            // var_dump($response);
    
            
            if (empty($response)) {
                $error["msg"] = "Can't complete your request at the moment.";
                $data["error"] = $error;
            } else {
                $rs =  json_decode($response,  true);

                // print_r($rs);
            
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
    
            echo json_encode($data);
        }
    
    }
?>