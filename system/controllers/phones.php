<?php
class Phones extends Controller
{

    public function getGadgetBy($id = "")
    {
        $param = new stdClass();
        $object = new stdClass();

        $param->id = $id;


        $object->name = "fetch_gadget_by_id";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);
        $res = json_decode($response, true);
        echo  json_encode($res['response']['data']);
    }
    public function index()
    {


        $param = new stdClass();
        $object = new stdClass();

        $param->code = "NA";


        $object->name = "fetch_open_listings";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('products/phones', $res);
    }

    public function filter()
    {

        // var_dump($_GET);

        if (isset($_GET['brand']) && 
        isset($_GET['model']) && 
        isset($_GET['condition']) && 
        isset($_GET['ram']) && 
        isset($_GET['storage']) && 
        isset($_GET['scrnSize']) && 
        isset($_GET['colour'])) {

            $brand = $_GET['brand'];
            $model = $_GET['model'];
            $condition = $_GET['condition'];
            $ram = $_GET['ram'];
            $storage = $_GET['storage'];
            $scrnSize = $_GET['scrnSize'];
            $colour = $_GET['colour'];

            $split = explode("_",$brand);
                $brand_name = $split[0];

        }

        $param = new stdClass();
        $object = new stdClass();

        $param->brand = $brand_name;
        $param->model = $model;
        $param->condition = $condition;
        $param->ram = $ram;
        $param->storage = $storage;
        $param->scrnSize = $scrnSize;
        $param->colour = $colour;


        $object->name = "fetch_open_listings_by_filter";
        $object->param = $param;

        $form_data  = json_encode($object);




        $response = curl_without_auth($form_data);

        $res = json_decode($response, true);
        // var_dump($response);

        // die();

        $this->view('products/phones', $res);
    }
}
