<?php
class Unique_model extends Controller
{

    public function index($model)
    {

        
        $bodytag = str_replace("-", " ", $model);
        // var_dump($bodytag);

        $param = new stdClass();
        $object = new stdClass();

        $param->model = $bodytag;


        $object->name = "fetch_open_listings_by_model";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('products/unique-model', $res);
    }
}
