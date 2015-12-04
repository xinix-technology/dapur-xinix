<?php

use App\Schema\MultipleSelect;

return array(
    'schema' => array(
        'short_endpoint' => MultipleSelect::create('short_endpoint')
            ->from('/user.json') // Data must be a valid json
            ->set('key', 'username')
            ->set('val', '$id'),
        'long_endpoint' => MultipleSelect::create('long_endpoint')
            ->from('http://localhost/putra/dapur-xinix/www/index.php/user.json') // Data must be a valid json
            ->set('key', 'username')
            ->set('val', '$id'),
        'array_dimention1' => MultipleSelect::create('array_dimention1')->from(function () {
            $data = array('Putra', 'Ali', 'Farid', 'Wahyu', 'Alam');

            return $data;
        }),
        'array_dimention2' => MultipleSelect::create('array_dimention2')->from(function () {
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
                    'label' => 'Ahmad'
                )
            );

            return $data;
        })
    )
);
