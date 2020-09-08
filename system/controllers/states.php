<?php
class States extends Controller {
    public function index() {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        $id = $_POST['id'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->id = $id;

    
        $object->name = "fetch_states";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // print_r($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}


?>