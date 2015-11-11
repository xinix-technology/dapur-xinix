<?php

use App\Schema\AutoComplete;

return array(
    'schema' => array(
        'short_endpoint' => AutoComplete::create('short_endpoint')
            ->from('/user.json') // Data must be a valid json
            ->set('key', 'username')
            ->set('val', '$id'),
        'long_endpoint' => AutoComplete::create('long_endpoint')
            ->from('http://localhost/putra/dapur-xinix/www/index.php/user.json') // Data must be a valid json
            ->set('key', 'username')
            ->set('val', '$id'),
        'array_dimention1' => AutoComplete::create('array_dimention1')->from(function () {
            $data = array('Putra', 'Ali', 'Farid');

            return $data;
        }),
        'array_dimention2' => AutoComplete::create('array_dimention2')->from(function () {
            $data = array(
                array(
                    'value' => 1,
                    'label' => 'Putra'
                ),
                array(
                    'value' => 2,
                    'label' => 'Ali'
                ),
                array(
                    'value' => 3,
                    'label' => 'Farid'
                )
            );

            return $data;
        })
    )
);
