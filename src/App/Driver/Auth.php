<?php

namespace App\Driver;

use ROH\BonoAuth\Driver\NormAuth;

class Auth extends NormAuth
{
    public function authorize($options = '')
    {
        if (empty($options)) {
            $options = array(
                'uri' => \App::getInstance()->request->getPathInfo(),
            );
        }

        if (is_string($options)) {
            $options = array('uri' => $options);
        }

        if (trim($options['uri']) == '') {
            $options = true;
        }

        $authorized = f('auth.authorize', $options);


        if (is_bool($authorized)) {
            return $authorized;
        }

        if (!empty($_SESSION['user'])) {
            return true;
        }
    }
}