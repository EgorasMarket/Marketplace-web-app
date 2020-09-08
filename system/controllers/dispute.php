<?php
class Dispute extends Controller
{

    public function index($slug)
    {

        // print_r($_POST);
        $success = array();
        $error = array();
        $data = array();

        // $sub_category = $_POST['sub_category'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->slug = $slug;


        $object->name = "fetch_listings_by_slug";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_without_auth($form_data);

        // print_r($response);

        //$res = json_decode($response, true);

        // $this->view('account/employee');


        $this->view('home/dispute', json_decode($response));
    }
}
