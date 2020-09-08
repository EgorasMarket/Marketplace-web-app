<?php
class New_phone extends Controller {

    public function index(){

        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();
  
        if (isset($_POST['phone'])){


            $phone = $_POST['phone'];

            if (empty($phone)) {
                $error["msg"] = "Please provide New phone";
                $data["error"] = $error;
            } else {
                // var_dump($reportee_id);
            
                $param = new stdClass();
                $object = new stdClass();
        
                $param->phone = $phone;
                
        
                $object->name = "add_phone";
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
    
              
        }else{
          $error["msg"] = "Error occurred. Try again later";
          $data["error"] = $error;
        }
      
    
      echo json_encode($data);
    
    
      }
}



?>