<?php
class Cdn extends Controller
{

    public function index($token_id = "")
    {
        $success = array();
        $error = array();
        $data = array();

        // $sub_category = $_POST['sub_category'];
        // var_dump($driver_id);


        $param = new stdClass();
        $object = new stdClass();

        $param->cdn = $token_id;


        $object->name = "fetch_token_metadata";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_without_auth($form_data);

        // print_r($response);

        $res = json_decode($response, true);
        $info = new stdClass();
        $attributes = new stdClass();

        $info->name = $res['response']['data']['info']['full_name'];
        $info->description = $res['response']['data']['info']['description'];
        $info->image = "https://egoras.com/public/static/phones/" . $res['response']['data']['info']['img'];
        $attributes->price = $res['response']['data']['info']['price'] . " EUSD";
        $attributes->operaing_system = $res['response']['data']['info']['operaing_system'];
        $attributes->brand = $res['response']['data']['info']['brand'];
        $attributes->model = $res['response']['data']['info']['model'];
        $attributes->condition = $res['response']['data']['info']['d_condition'];

        $info->attributes = $attributes;
        // $this->view('account/employee');
        $token_info = json_encode($info);
        echo $token_info;
    }
}
