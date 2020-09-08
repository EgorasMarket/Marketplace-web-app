<?php
class Home_models extends Controller
{
    public function iphone()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $iphone = "iphone";


        $param = new stdClass();
        $object = new stdClass();

        $param->brand = $iphone;

    
        $object->name = "fetch_models_for_index";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // print_r($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

    public function samsung()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $samsung = "samsung";
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->brand = $samsung;

    
        $object->name = "fetch_models_for_index";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }

    public function tecno()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $tecno = "tecno";
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->brand = $tecno;

    
        $object->name = "fetch_models_for_index";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}