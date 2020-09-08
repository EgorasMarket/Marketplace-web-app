<?php 
    class Submit_list extends Controller
    {
    
        public function index()
        {
            $success = array();
            $error = array();
            $data = array();

            // print_r($_POST);
                
            if (isset($_POST['category']) && 
            isset($_POST['walletId']) && 
            isset($_POST['sub_category']) && 
            isset($_POST['brand']) && 
            isset($_POST['condition']) && 
            isset($_POST['storage_cap']) && 
            isset($_POST['screen_size']) && 
            isset($_POST['selfie_cam']) && 
            isset($_POST['main_cam']) && 
            isset($_POST['model']) && 
            isset($_POST['ram']) && 
            isset($_POST['colour']) && 
            isset($_POST['operating_sys']) && 
            isset($_POST['sim']) && 
            isset($_POST['card_slot']) && 
            isset($_POST['battery']) && 
            isset($_POST['country']) && 
            isset($_POST['state']) && 
            isset($_POST['description'])) {
                $walletId = $_POST['walletId'];
                $category = $_POST['category'];
                $sub_category = $_POST['sub_category'];
                $brand = $_POST['brand'];
                $condition = $_POST['condition'];
                $storage_cap = $_POST['storage_cap'];
                $screen_size = $_POST['screen_size'];
                $selfie_cam = $_POST['selfie_cam'];
                $main_cam = $_POST['main_cam'];
                $model = $_POST['model'];
                $ram = $_POST['ram'];
                $colour = $_POST['colour'];
                $operating_sys = $_POST['operating_sys'];
                $sim = $_POST['sim'];
                $card_slot = $_POST['card_slot'];
                $battery = $_POST['battery'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $split = explode("_",$brand);
                $brand_name = $split[0];

                $split2 = explode("_",$country);
                $country_name = $split2[0];

            } 

            $final_image2 = "none";
            $final_image3 = "none";
            $final_image4 = "none";
            $final_image5 = "none";
            
        
            $valid_extensions = array('jpeg' , 'JPEG' , 'jpg', 'JPG', 'PNG' , 'png');
            $img_url = 'public/static/phones/';

        
            if (empty($category) || 
            empty($sub_category) || 
            empty($brand) || 
            empty($condition) || 
            empty($storage_cap) || 
            empty($screen_size) || 
            empty($selfie_cam) || 
            empty($main_cam) || 
            empty($model) || 
            empty($ram) || 
            empty($colour) || 
            empty($operating_sys) || 
            empty($sim) || 
            empty($card_slot) || 
            empty($battery) || 
            empty($country) || 
            empty($state) || 
            empty($price) || 
            empty($description)) {
            $error["msg"] = "Please provide all required information";
            $data["error"] = $error;

            } else {

                if ($_FILES["file1"]) {
                    $imgsurfix = "DRV";
                    $image1 = $_FILES['file1']['name'];
                    $type1 = $_FILES['file1']['type'];
                    $tmp_name1 = $_FILES['file1']['tmp_name'];
        
                    if ($_FILES["file2"]) {
                        $image2 = $_FILES['file2']['name'];
                        $type2 = $_FILES['file2']['type'];
                        $tmp_name2 = $_FILES['file2']['tmp_name'];
        
                        $ext2 = strtolower(pathinfo($image2, PATHINFO_EXTENSION));
        
                        if ($ext2 == "jpeg" || $ext2 == "JPEG" || $ext2 == "jpg" || $ext2 == "JPG") {
                            $final_image2 = rand(1000,1000000).$imgsurfix.".jpg";                
                        } else if ($ext2 == "PNG" || $ext2 == "png") {
                            $final_image2 = rand(1000,1000000).$imgsurfix.".png";    
                        }
        
                        if (in_array($ext2, $valid_extensions)) {
                            $img_url2 = $img_url.$final_image2;
                        }
        
                    }
        
                    if ($_FILES["file3"]) {
                        $image3 = $_FILES['file3']['name'];
                        $type3 = $_FILES['file3']['type'];
                        $tmp_name3 = $_FILES['file3']['tmp_name'];
        
                        $ext3 = strtolower(pathinfo($image3, PATHINFO_EXTENSION));
        
                        if ($ext3 == "jpeg" || $ext3 == "JPEG" || $ext3 == "jpg" || $ext3 == "JPG") {
                            $final_image3 = rand(1000,1000000).$imgsurfix.".jpg";                
                        } else if ($ext3 == "PNG" || $ext3 == "png") {
                            $final_image3 = rand(1000,1000000).$imgsurfix.".png";    
                        }
        
                        if (in_array($ext3, $valid_extensions)) {
                            $img_url3 = $img_url.$final_image3;
                        }
        
                    }
        
                    if ($_FILES["file4"]) {
                        $image4 = $_FILES['file4']['name'];
                        $type4 = $_FILES['file4']['type'];
                        $tmp_name4 = $_FILES['file4']['tmp_name'];
        
                        $ext4 = strtolower(pathinfo($image4, PATHINFO_EXTENSION));
        
                        if ($ext4 == "jpeg" || $ext4 == "JPEG" || $ext4 == "jpg" || $ext4 == "JPG") {
                            $final_image4 = rand(1000,1000000).$imgsurfix.".jpg";                
                        } else if ($ext4 == "PNG" || $ext4 == "png") {
                            $final_image4 = rand(1000,1000000).$imgsurfix.".png";    
                        }
        
                        if (in_array($ext4, $valid_extensions)) {
                            $img_url4 = $img_url.$final_image4;
                        }
        
                    }
        
                    if ($_FILES["file5"]) {
                        $image5 = $_FILES['file5']['name'];
                        $type5 = $_FILES['file5']['type'];
                        $tmp_name5 = $_FILES['file5']['tmp_name'];
        
                        $ext5 = strtolower(pathinfo($image5, PATHINFO_EXTENSION));
        
                        if ($ext5 == "jpeg" || $ext5 == "JPEG" || $ext5 == "jpg" || $ext5 == "JPG") {
                            $final_image5 = rand(1000,1000000).$imgsurfix.".jpg";                
                        } else if ($ext5 == "PNG" || $ext5 == "png") {
                            $final_image5 = rand(1000,1000000).$imgsurfix.".png";    
                        }
        
                        if (in_array($ext5, $valid_extensions)) {
                            $img_url5 = $img_url.$final_image5;
                        }
        
                    }
        
        
                    $ext1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));
                    // $msgArray = array('status' => "OK", 'msg' => $ext);
        
                    if ($ext1 == "jpeg" || $ext1 == "JPEG" || $ext1 == "jpg" || $ext1 == "JPG") {
                        $final_image1 = rand(1000,1000000).$imgsurfix.".jpg";                
                    } else if ($ext1 == "PNG" || $ext1 == "png") {
                        $final_image1 = rand(1000,1000000).$imgsurfix.".png";    
                    }
        
        
                    if (in_array($ext1, $valid_extensions)) {
                        $img_url1 = $img_url.$final_image1; 
                        
                        if (move_uploaded_file($tmp_name1, $img_url1) || 
                            move_uploaded_file($tmp_name2, $img_url2) || 
                            move_uploaded_file($tmp_name3, $img_url3) || 
                            move_uploaded_file($tmp_name4, $img_url4) || 
                            move_uploaded_file($tmp_name5, $img_url5)) {
                                
                            $param = new stdClass();
                            $object = new stdClass();
                    
                            $param->walletId        = $walletId;
                            $param->category        = $category;
                            $param->sub_category    = $sub_category;
                            $param->brand           = $brand_name;
                            $param->condition       = $condition;
                            $param->storage_cap     = $storage_cap;
                            $param->screen_size     = $screen_size;
                            $param->selfie_cam      = $selfie_cam;
                            $param->main_cam        = $main_cam;
                            $param->model           = $model;
                            $param->ram             = $ram;
                            $param->colour          = $colour;
                            $param->operating_sys   = $operating_sys;
                            $param->sim             = $sim;
                            $param->card_slot       = $card_slot;
                            $param->battery         = $battery;
                            $param->country         = $country_name;
                            $param->state           = $state;
                            $param->description     = $description;
                            $param->price           = $price;
                            $param->img1             = $final_image1;
                            $param->img2             = $final_image2;
                            $param->img3             = $final_image3;
                            $param->img4             = $final_image4;
                            $param->img5             = $final_image5;
                            
                    
                            $object->name = "list_gadget";
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
        
                        } else {
                            $error["msg"] = "Something went with the image upload, please try again";
                            $data["error"] = $error;
                        }
                        
                    } else {
                        $error["msg"] = "Invalid image type, image must be jpg or png extension";
                        $data["error"] = $error;
                    }
        
                } else {
                    $error["msg"] = "Please provide at least an image.";
                    $data["error"] = $error;
                }
                
            }

            echo json_encode($data);
                               


        }
    
    }
?>