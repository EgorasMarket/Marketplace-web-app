<?php
class Sell_now extends Controller
{

    public function index()
    {

        $id = 2;

        $param = new stdClass();
        $object = new stdClass();

        $param->id = $id;


        $object->name = "fetch_custodian_details";
        $object->param = $param;

        $form_data  = json_encode($object);



        $response = curl_with_auth($form_data);

        // var_dump($response);

        $res = json_decode($response, true);

        $this->view('account/sell-item', $res['response']['data']);
    }

    public function lockToken($token_id = "")
    {
        $param = new stdClass();
        $object = new stdClass();

        $param->id = $token_id;
        $param->wallet = $_COOKIE['walletId'];


        $object->name = "partiallySellItem";
        $object->param = $param;

        $form_data  = json_encode($object);
        $response = curl_without_auth($form_data);
        echo  $response;
    }
    //

    public function partialRelease($id = "")
    {
        $param = new stdClass();
        $object = new stdClass();

        $param->id = $id;
        $param->wallet = $_COOKIE['walletId'];


        $object->name = "partiallysetRelease";
        $object->param = $param;

        $form_data  = json_encode($object);
        $response = curl_without_auth($form_data);
        echo  $response;
    }

    public function partialBuy($id = "")
    {
        $param = new stdClass();
        $object = new stdClass();

        $param->id = $id;
        $param->wallet = $_COOKIE['walletId'];


        $object->name = "partiallysetBuyOrder";
        $object->param = $param;

        $form_data  = json_encode($object);
        $response = curl_without_auth($form_data);
        echo  $response;
    }


    public function finalize($token_id = "")
    {
        $param = new stdClass();
        $object = new stdClass();

        $param->id = $token_id;
        $param->wallet = $_COOKIE['walletId'];


        $object->name = "partiallyFinalized";
        $object->param = $param;

        $form_data  = json_encode($object);
        $response = curl_without_auth($form_data);
        echo  $response;
    }
}
