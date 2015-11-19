<?php

namespace App\Provider;

use Norm\Norm;
use App\Library\Currency;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get('/test/:id', function ($id) use ($app) {

        		var_dump(Currency::terbilang_en($id) );
        		

        });

    }


}
