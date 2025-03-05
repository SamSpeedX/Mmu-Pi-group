<?php

use kibalanga\App\Model\Zeno;
use kibalanga\core\Verify;
use kibalanga\core\ZenoPay;

class ZenoController
{
    public function card($request) {
        $name = $request['name'];
        $number = $request['number'];
        $email = $request['email'];
        $amount = $request['amount'];
        $country = $request['country'];
        $webhook = '';
        $redirect_url = 'http://127.0.0.1:8000/about';
        $cancell_url = 'http://127.0.0.1:8000/developersuport';

        $pay = ZenoPay::card($name, $number, $email, $amount, $country, $webhook, $redirect_url, $cancell_url);

        if ($pay['status'] === 'success') {
            $result = $pay['data'];
            echo $result;
        } else {
            echo "Transaction fail!";
        }
    }

    public function pay($request) 
    {
        $zeno = new Zeno();

        $key = APP_KEY;//$request['key'];
        // $email = Verify::check($_POST['email']);
        // $name = Verify::check($_POST['name']);
        // $number = Verify::check($_POST['number']);
        // $amount = Verify::check($_POST['amount']);
        // $webuhook = "";

        // $jibu = ZenoPay::pay($email, $name, $number, $amount, $webuhook);

        $jibu = ZenoPay::pay("samochuu@gamil.com", "sam", "0778760701", "1000", "");
        $data = $jibu; 
        // var_dump($data);
        if ($data['status'] == 'success') {
            $order = $data['order_id'];

            $jawabu = $zeno->create($key, $order);
            if ($jawabu['status'] == 'success') {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }
}
// 67c6e702628bf