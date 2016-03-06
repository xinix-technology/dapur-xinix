<?php

namespace Dapurxinix\Provider;



class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $d = explode(DIRECTORY_SEPARATOR.'src', __DIR__);
        $this->app->theme->addBaseDirectory($d[0], 10);


    }


}
