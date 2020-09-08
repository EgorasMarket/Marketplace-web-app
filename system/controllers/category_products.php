<?php
class Category_products extends Controller
{
    public function index()
    {
        // var_dump($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_POST['sub_category'])) {
            $sub_category = $_POST['sub_category'];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->sub_category = $sub_category;

    
        $object->name = "fetch_sub_category_gadgets";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

}