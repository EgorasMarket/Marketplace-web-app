<?php
class Submit_dispute extends Controller {

    public function index(){

        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();

        $valid_extensions = array('jpeg' , 'JPEG' , 'jpg', 'JPG', 'PNG' , 'png');
            $img_url = 'public/static/evidence/';


            


        if (isset($_COOKIE['walletId'])) {
            $sender = $_COOKIE['walletId'];
        }
  
        if (isset($_POST['slug']) && isset($_POST['disputeMessage'])){

            $final_image1 = "none";
            $slug = $_POST['slug'];
            $message = $_POST['disputeMessage'];

            

            if (empty($message)) {
                $error["msg"] = "Please write a message";
                $data["error"] = $error;
            } else {
                
                if ($_FILES["file"]) {
                    $imgsurfix = "DRV";
                    $image1 = $_FILES['file']['name'];
                    $type1 = $_FILES['file']['type'];
                    $tmp_name1 = $_FILES['file']['tmp_name'];

                    $ext1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));

                    if ($ext1 == "jpeg" || $ext1 == "JPEG" || $ext1 == "jpg" || $ext1 == "JPG") {
                        $final_image1 = rand(1000,1000000).$imgsurfix.".jpg";                
                    } else if ($ext1 == "PNG" || $ext1 == "png") {
                        $final_image1 = rand(1000,1000000).$imgsurfix.".png";    
                    }

                    if (in_array($ext1, $valid_extensions)) {
                        $img_url1 = $img_url.$final_image1; 

                        move_uploaded_file($tmp_name1, $img_url1);
                        
                    } 
                
                } 

                // var_dump($reportee_id);
            
                $param = new stdClass();
                $object = new stdClass();
        
                $param->sender = $sender;
                $param->slug = $slug;
                $param->message = $message;
                $param->upload = $final_image1;
                
        
                $object->name = "insert_dispute";
                $object->param = $param;
        
                $form_data  = json_encode($object);
        
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