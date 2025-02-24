<?php

use kibalanga\App\Model\Product;
use kibalanga\core\Redirect;
use kibalanga\core\Upload;

class ProductController 
{ 
    //  
    public function index() 
    { 
        //  
    } 

    public function readone($request) 
    { 
        $Product = new Product(); 

        $id = $request["id"];
        $result = $Product->read($id); 
        return $result; 
         
    } 

    public function readAll() 
    { 
        $product = new Product(); 
        $response = $product->readAll();
        return $response;
    } 


    public function create($request) 
    { 
        $Product = new Product();
        $upload = new Upload();
        
        $name = $request["name"]; 
        $description = $request["description"]; 
        $price = $request["price"];
        $category = $request["category"];
        $date = $request["expire_date"];
        $total = $request['stock'];
        
        $response = $upload->product($_FILES['file']);
    
        if ($response["success"]) {
            $img = $response["file_path"]; // Get uploaded file path

            $result = $Product->create($name, $description, $price, $img, $category, $date, $total);

            if ($result['status'] === 'success') {
                Redirect::to("/marchant/products"); // Redirect to home on success
            } else {
                $message =  $result['message'];
                return $message;
            }
        } else {
            $message = "Image upload failed: " . $response["message"];
            return $message;
        }
    }
    

    public function update($request) 
    {
        $Product = new Product();
        $Upload = new Upload();

        $name = $request["name"]; 
        $description = $request["description"]; 
        $price = $request["price"];
        $category = $request["category"];
        $date = $request["expire_date"];
        $total = $request['stock'];

        // Handle image upload
        $response = $Upload->image($_FILES['file']);
    
        if ($response["success"]) {
            $img = $response["file_path"]; // Get uploaded file path

            $result = $Product->update($name, $description, $price, $img, $category, $date, $total);
    
            if (!isset($result["message"])) {
                Redirect::to("/marchant/products"); // Redirect to home on success
            } else {
                echo $result['message'];
            }
        } else {
            echo "Image upload failed: " . $response["message"];
        }
    }
    
    public function delete($request)
    {
        $Product = new Product();

        $id = $request["token"];

        $result = $Product->delete($id);

        if ($result["status"] == "success") {
           Redirect::to('/marchant/products');
        }
        return $result["message"];
    }

    public function deleteAll($request)
    {
        $Product = new Product();
        $re = $request['all'];
        $result = $Product->deleteAll($re);
        // return $re;
        if ($result["status"] == "success") {
           Redirect::to('/marchant/products');
        }
        return $result["message"];
    }
}
