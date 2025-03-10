<?php

use Google\Service\Connectors\ExchangeAuthCodeResponse;
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

        $email = $request['email'];
        $password = $request["password"];

        // $recaptcha_secret = CAPTCHASITE;
        // $recaptcha_response = $_POST["g-recaptcha-response"];
    
        // $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}";
    
        // $response = file_get_contents($verify_url);
        // $response_data = json_decode($response, true);
    
        // if (!$response_data["success"]) {
        //     return "reCAPTCHA verification failed!";
        // }

        $result = $user->login($email, $password);
        // echo json_encode($result);
        if ($result['status'] == 'success') {
            // process your session
            $_SESSION['token'] = $result['id'];
            $_SESSION['role'] = $result['role'];
            echo "success";
        } else {
            // error message.
            $message = $result['message'];
            echo $message;
        }
    }

    public function register($request)
    {
        $user = new User();

        $name = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $address = $request['address'];
        $key = $request['key'];
        $role = $request['role'];

        if ($role == null) {
            $role = 'buyer';
        }

        // $recaptcha_secret = CAPTCHASITE;
        // $recaptcha_response = $_POST["g-recaptcha-response"];
    
        // $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}";
    
        // $response = file_get_contents($verify_url);
        // $response_data = json_decode($response, true);
    
        // if (!$response_data["success"]) {
        //     echo "reCAPTCHA verification failed!";
        // }

        if ($role == 'marchant') {
            $account = $role;
            $bname = $request['bname'];
            $country = $request['country'];
            $nida = $request['nida'];
            $tin = $request['tin'];
            $location = $request['location'];

            $resulti = $user->b($key, $name, $email, $password, $address, $account, $bname, $country, $nida, $tin, $location);

            if ($resulti['status'] == 'success') {
                echo "success";
            } else {
                $message = $resulti['message'];
                echo $message;
            }
        }
        
        $result = $user->create($key, $name, $email, $password, $address, $role);

        if ($result['status'] == 'success') {
            echo "success";
        } else {
            $message = $result['message'];
            echo $message;
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

            if ($result['status'] == 'success') {
                Redirect::to('/marchant');
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
