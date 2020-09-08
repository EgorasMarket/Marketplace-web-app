<?php
class Unique_brand extends Controller
{

    public function index($brand)
    {

        // var_dump($brand);
        $param = new stdClass();
        $object = new stdClass();

        $param->brand = $brand;


        $object->name = "fetch_open_listings_by_brand";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('products/unique-brand', $res);
    }
}
