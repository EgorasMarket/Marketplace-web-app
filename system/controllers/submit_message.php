<?php
class Submit_message extends Controller {

    public function index(){

        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        if (isset($_COOKIE['walletId'])) {
            $seller = $_COOKIE['walletId'];
        }
  
        if (isset($_POST['buyer']) && isset($_POST['seller_msg']) && isset($_POST['slug'])){


            $slug = $_POST['slug'];
            $buyer = $_POST['buyer'];
            $seller_msg = $_POST['seller_msg'];


            if (empty($seller_msg)) {
                $error["msg"] = "Please write a message";
                $data["error"] = $error;
            } else {
                // var_dump($reportee_id);
            
                $param = new stdClass();
                $object = new stdClass();
        
                $param->slug = $slug;
                $param->seller = $seller;
                $param->buyer = $buyer;
                $param->content = $seller_msg;
                
        
                $object->name = "insert_seller_message";
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

    public function reply(){
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        if (isset($_COOKIE['walletId'])) {
            $seller = $_COOKIE['walletId'];
        }
  
        if (isset($_POST['reply_to']) && isset($_POST['product_slug']) && isset($_POST['seller']) && isset($_POST['message'])){


            $reply_to = $_POST['reply_to'];
            $product_slug = $_POST['product_slug'];
            $buyer = $_POST['seller'];
            $message = $_POST['message'];


            if (empty($message)) {
                $error["msg"] = "Please write a message";
                $data["error"] = $error;
            } else {
                // var_dump($reportee_id);
            
                $param = new stdClass();
                $object = new stdClass();
        
                // $param->reply_to = $reply_to;
                $param->product_slug = $product_slug;
                $param->seller = $seller;
                $param->buyer = $buyer;
                $param->content = $message;
                
        
                $object->name = "insert_buyer_reply";
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