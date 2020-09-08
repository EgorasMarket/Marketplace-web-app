<?php
class Unique_message extends Controller
{

    public function index($slug)
    {

        setcookie("slug", $slug, time() + 13600, "/");

        $param = new stdClass();
        $object = new stdClass();

        $param->slug = $slug;


        $object->name = "get_message_by_slug";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('account/unique-message', $res['response']['data']);
    }
}
