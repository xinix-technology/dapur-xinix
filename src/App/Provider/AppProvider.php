<?php

namespace App\Provider;

use Norm\Norm;
use App\Library\Currency;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;
    }
}
