<?php

namespace kibalanga\storage;

use kibalanga\core\Redirect;
use kibalanga\core\Request;

class Session
{
    public static function check()
    {

        if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
            if ($_SERVER['REQUEST_URI'] !== '/login') {
                Redirect::to('/login');
                exit;
            }
        }
    }

    public static function Admin()
    {
        self::check();
        $j = Request::ReadWhereToken('users', $_SESSION['token']);

        if ($j['status'] === 'success' && isset($j['data'][0])) {
            $result = $j['data'][0];
            if ($result['role'] !== "admin") {
                Redirect::to("/user/profile");
            }
        } else {
            Redirect::to('/login'); 
            exit;
        }
    }

    public static function marchant()
    {
        self::check();
        $j = Request::ReadWhereToken('users', $_SESSION['token']);

        if ($j['status'] === 'success' && isset($j['data'][0])) {
            $result = $j['data'][0];
            if ($result['role'] !== "marchant") {
                Redirect::to("/user/profile");
            }
        } else {
            Redirect::to('/login'); 
            exit;
        }
    }

    public static function member()
    {
        self::check();

        $j = Request::ReadWhereToken('users', $_SESSION['token']);

        if ($j['status'] === 'success' && isset($j['data'][0])) {
            $result = $j['data'][0];
            if ($result['role'] !== "member") {
                Redirect::to("/");
                exit;
            }
        } else {
            Redirect::to('/login'); 
            exit;
        }
    }

    public static function profile()
    {
        self::check();
        $j = Request::ReadWhereToken('users', $_SESSION['token']);
        // echo json_encode($j);
        if ($j['status'] === 'success' && isset($j['data'][0])) {
            $result = $j['data'][0];
        } else {
            Redirect::to('/login'); 
            exit;
        }

        switch ($result['role']) {
            case 'admin':
                if ($_SERVER['REQUEST_URI'] !== '/boss') {
                    Redirect::to('/boss');
                }
                break;
            case 'member':
                if ($_SERVER['REQUEST_URI'] !== '/member') {
                    Redirect::to('/member');
                }
                break;
            case 'marchant':
                if ($_SERVER['REQUEST_URI'] !== '/marchant') {
                    Redirect::to('/marchant');
                }
                break;
            case 'buyer':
                if ($_SERVER['REQUEST_URI'] !== '/user/profile') {
                    Redirect::to('/user/profile');
                }
                break;
            default:
                Redirect::to('/');
                // exit;
                break;
        }
        
    }
}
