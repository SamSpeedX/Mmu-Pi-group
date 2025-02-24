<?php

use kibalanga\core\Redirect;
use kibalanga\App\Model\User;
use kibalanga\core\Upload;

class UserController
{
    // 
    public function index($request)
    {
        return $request['login'];
    }

    public function user($request)
    {
        $user = new User();
        $id = $request['id'];
        $result = $user->read($id);
        if ($result['status'] == 'fail') {
            return $request;//$result['message'];
        }
        // user info
        return $result;
    }

    public function users()
    {
        $user = new User();
        $users = $user->readAll();
        return $users;

    }

    public function login($request)
    {
        $user = new User();

        // $token = $request['key'];
        $email = $request['email'];
        $password = $request["password"];

        $result = $user->login($email, $password);
        // echo json_encode($result);

        if ($result['status'] == 'success') {
            // process your session
            $_SESSION['token'] = $result['id'];
            Redirect::to('/');
        } else {
            // error message.
            return $result['message'];
        }
    }

    public function register($request)
    {
        $user = new User();

        $name = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $address = $request['address'];
        // $account = $request['account'];
        // $bname = $request['bname'];
        // $country = $request['country'];
        // $nida = $request['nida'];
        // $tin = $request['tin'];
        $key = $request['key'];
        
        $result = $user->create($key, $name, $email, $password, $address); //, $phone, $account, $bname, $country, $nida, $tin);
        // echo json_encode($result);

        if ($result['status'] == 'success') {
            // redirect
            Redirect::to('/login');
        } else {
            // error message
            return $result['message'];
        }
    }

    public function deleP($request)
    {
        $user = new User();
        $key = APP_KEY;
        $id = $request['token'];
        $result = $user->deletep($key, $id);

        if ($result['status'] == 'success') {
            Redirect::to('/marchant/accounts');
        } elseif (isset($result['message'])) {
            return $result['message'];
        }
    }

    public function profile($request)
    {
        $user = new User();
        $upload = new Upload();
        
        // Handle image upload
        $response = $upload->profile($_FILES['file']);
    
        if ($response["success"]) {
            $img = $response["file_path"]; // Get uploaded file path
            $token = $_SESSION['token'];
            $result = $user->profile($img, $token);
            // echo json_encode($result);

            if ($result['status'] == 'success') {
                Redirect::to('/marchant/accounts');
            } elseif (!isset($result['message'])) {
                echo $result['message'];
            }
             else {
                echo $result['message'];
            }
        }
    }

    public function update($request)
    {
        $user = new User();
        $name = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $key = "";

        $response = $user->update($key, $name, $email, $password);
        return $response;
    }

    public function logout()
    {
        session_destroy();
        session_abort();
        Redirect::to('/');
    }
}
