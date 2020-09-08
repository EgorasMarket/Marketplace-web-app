<?php
class New_state extends Controller {

    public function index(){

        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();
  
        if (isset($_POST['countryasa']) && isset($_POST['state'])){


            $country = $_POST['countryasa'];
            $state = $_POST['state'];

            $pieces = explode("_", $country);

            // $country_id = $pieces[1];
            if (isset($pieces[1])) {
                $country_id = $pieces[1];
            } else {
                $country_id = "";
                $error["msg"] = "Please provide country";
                $data["error"] = $error;
            }

            if (empty($country) || empty($state)) {
                $error["msg"] = "Please provide country and state";
                $data["error"] = $error;
            } else {
                // var_dump($reportee_id);
            
                $param = new stdClass();
                $object = new stdClass();
        
                $param->country_id = $country_id;
                $param->state = $state;
                
        
                $object->name = "insert_states";
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