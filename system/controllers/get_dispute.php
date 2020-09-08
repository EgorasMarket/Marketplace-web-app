<?php
class Get_dispute extends Controller {

    public function index()
    {
        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();
        
        if (isset($_POST['slug'])) {
            $slug = $_POST['slug'];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->slug = $slug;
        // $param->walletId = $walletId;

    
        $object->name = "fetch_dispute";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_without_auth($form_data);

        // var_dump($response);
        
        //$res = json_decode($response, true);

        // $this->view('account/employee');

        echo  $response;
    }
}

?>