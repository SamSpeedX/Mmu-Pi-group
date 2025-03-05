<?php

use Google\Service\Connectors\ExchangeAuthCodeResponse;
use kibalanga\core\Redirect;
use kibalanga\App\Model\User;
use kibalanga\core\Upload;

class UsersController
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

    public function deleP($request)
    {
        $user = new User();
        $key = APP_KEY;
        $id = $request['token'];
        $result = $user->deletep($key, $id);

        if ($result['status'] == 'success') {
            // Redirect::to("/boss/edit_user?token=$id");
            echo "success";
        } elseif (isset($result['message'])) {
            return $result['message'];
        }
    }

    public function profile($request)
    {
        $user = new User();
        $upload = new Upload();
        $response = $upload->profile($_FILES['file']);
    
        if ($response["success"]) {
            $img = $response["file_path"];
            $token = $request['token'];
            $result = $user->profile($img, $token);

            if ($result['status'] == 'success') {
                // Redirect::to("/boss/edit_user?token=$token");
                echo "success";
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
        $key = APP_KEY;

        $response = $user->update($key, $name, $email, $password);
        return $response;
    }

    public function delete($request) 
    {
        $user = new User();
        $token = $request['token'];
        $key = APP_KEY;

        $response = $user->delete($key, $token);

        if ($response['status'] == 'success') {
            Redirect::to('/logout?out=true');
        } else {
            return $response;
        }
    }

    public function registerWithgoogle()
    { 

        $client = new Google_Client();
        $client->setClientId(AUTHENTIC_ID);
        $client->setClientSecret(AUTHENTIC_SECRETE);
        $client->setRedirectUri('http://127.0.0.1:8000/register_callback'); 
        $client->addScope('email');
        $client->addScope('profile');
        
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        
            if (!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);
        
                $oauth2 = new Google_Service_Oauth2($client);
                $userInfo = $oauth2->userinfo->get();
        
                $google_id = $userInfo->id;
                $name = $userInfo->name;
                $email = $userInfo->email;
                $img = $userInfo->picture;

                if (empty($name)) {
                    $name = $email;
                }

                $user = new User();
                $jibu = $user->googlePlus(APP_KEY, $google_id, $name, $email, $img);

                // echo json_encode($jibu);

                if ($jibu['status'] == 'success') {
                    // Redirect::to('/google');
                    echo "success";
                } else {
                    return $jibu['message'];
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        session_abort();
        Redirect::to('/');
    }
}
