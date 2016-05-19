<?php

use Norm\Schema\String;
use Norm\Schema\Reference;
use Norm\Schema\NormArray;
use DapurXinix\Schema\Upload;
use DapurXinix\Schema\DatePicker;
use DapurXinix\Schema\MultipleSelect;
use DapurXinix\Schema\AutoComplete;
use DapurXinix\Schema\UploadImage;

return array(
    'schema' => array(
		'upload' => Upload::create('upload')->set('list-column', true)->set('bucket', '/testing')->set('encrypt', true),
        'uploadimage' => UploadImage::create('uploadimage')->set('list-column', true)->set('bucket', 'image')->set('target','#imgupload'),
        'title' => String::create('title')->set('list-column', true),

        
        'group' => Reference::create('group')->to(array('1'=>'testing','2'=>'testing2'))->set('list-column', true),
        
        'date' => DatePicker::create('date')->set('list-column', true),
        'multi' => MultipleSelect::create('multi')->from(array('1'=>'testing1','2'=>'testing2'))->set('list-column', true),
        'complete' => AutoComplete::create('complete')->to(array('1'=>'abcd','2'=>'defg'))->set('list-column', true),
        'complete2' => AutoComplete::create('complete2')->to('User','$id','username')->set('list-column', true),
        'complete1' => Reference::create('complete1')->to('User','$id','username')->set('list-column', true),
        'normarray' => NormArray::create('normarray')->set('list-column', true),
        
        
    ),
);