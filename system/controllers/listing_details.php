<?php
class Listing_details extends Controller
{
    public function fetchPhones()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        // $sub_category = $_POST['sub_category'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->code = "NA";

    
        $object->name = "fetch_phones";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // print_r($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

    public function fetchModels()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $phone_id = $_POST['phone_id'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->id = $phone_id;

    
        $object->name = "fetch_models";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

    public function fetchDetails()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $model = $_POST['model'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->model = $model;

    
        $object->name = "fetch_model_info";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}