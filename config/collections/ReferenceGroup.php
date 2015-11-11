<?php

use App\Schema\AutoComplete;

return array(
    'schema' => array(
        'short_endpoint' => AutoComplete::create('short_endpoint')
            ->from('/user.json') // Data must be a valid json
            ->set('key', 'username')
            ->set('val', '$id'),
         )
    );