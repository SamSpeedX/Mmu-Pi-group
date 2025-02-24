<?php

namespace kibalanga\core;

use kibalanga\core\Redirect;

class Session
{
    public static function check()
    {
        if (! isset($_SESSION['token'])) {
            Redirect::to('/login');
        }
    }

    public static function profile()
    {
        $result = Request::read('users', $_SESSION['token']);
        if ($result['status'] !== 'fail') {
            $data = $result['data'];
            $_SESSION['uhusika'] = $data['account'];
        }

        if ($_SESSION['uhusika'] == 'binafsi') {
            Redirect::to('profile');
        }

        if ($_SESSION['uhusika'] === 'biashara') {
            Redirect::to('dashboard');
        }
    }

}
