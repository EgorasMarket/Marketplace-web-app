<?php
class Phones_result extends Controller
{
    public function index()
    {
       
        if(isset($_GET["search_input"])) {
            $search_input = $_GET["search_input"];
        }

        $param = new stdClass();
        $object = new stdClass();

        $param->input = $search_input;

    
        $object->name = "phone_search";
        $object->param = $param;

        $form_data  = json_encode($object);
            
           
            
        $response = curl_with_auth($form_data);
        
        $res = json_decode($response, true);
        
        
        $this->view('products/phones-result', $res['response']['data']);
        // $this->view('home/local-drivers', $res['response']['data']);
    }
}