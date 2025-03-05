<?php

use kibalanga\App\Model\Cart;

class CartController 
{ 
    //  
    public function index() 
    { 
        //  
    } 

    public function readone($request) 
    { 
        $Cart = new Cart(); 

        $id = $request["id"];
        $result = $Cart->read($id); 
        // user info 
        return $result; 
         
    } 

    public function readAll() 
    { 
        $user = new Cart(); 
        $users = $user->readAll();
        return $users;
    } 


    public function create($request) 
    { 
        $Cart = new Cart();

        // $key = $request['key'];
        // $buyer_token = $_SESSION['token'];
        // $sellar_token = $request['sellar'];
        // $name = $request["name"]; 
        // $description = $request["description"]; 
        // $price = $request["price"]; 
        // $total = 1;
        // echo json_encode($request);
        echo "success";
        // $result = $Cart->create($key, $sellar_token, $buyer_token, $name, $description, $price, $total); 

        // if ($result["status"] == "success") {
        //    echo "seuccess";
        // }
        // $message = $result['message'];
        // echo $message;
    }

    public function update($request) 
    {
        $Cart = new Cart();

        $buyer_id = $_SESSION['token'];
        $total = $request["total"];
        $token = $request['token'];

        $result = $Cart->update($buyer_id, $total, $token);

        if ($result["status"] == "success") {
           echo "seccess";
        }
        $message = $result["message"];
        echo $message;
    }
    
    public function delete($request)
    {
        $Cart = new Cart();

        $delete = $request["id"];

        $result = $Cart->delete($delete);

        if ($result["status"] == "success") {
           return $request["message"];
        }
        return $result["message"];
    }
}
