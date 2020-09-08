<?php
class Contact_us extends Controller {

    public function index(){
        // var_dump($_POST);


        $success = array();
        $error = array();
        $data = array();
  
        if (isset($_POST['fullname']) && isset($_POST['email2']) && isset($_POST['message'])){


            $fullname = $_POST['fullname'];
            $email2 = $_POST['email2'];
            $message = $_POST['message'];

            // var_dump($reportee_id);
            
            $param = new stdClass();
            $object = new stdClass();
    
            $param->fullname = $fullname;
            $param->email2 = $email2;
            $param->message = $message;
            
    
            $object->name = "insert_contact_us";
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
    
              
        }else{
          $error["msg"] = "Error occurred. Try again later";
          $data["error"] = $error;
        }
      
    
      echo json_encode($data);
    
    
      }
}



?>