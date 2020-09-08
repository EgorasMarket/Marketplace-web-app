<?php
class Local_order extends Controller
{

    public function index($state)
    {

        

        $param = new stdClass();
        $object = new stdClass();

        $param->state = $state;


        $object->name = "fetch_open_listings_by_state";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('products/unique-state', $res);
    }
}
