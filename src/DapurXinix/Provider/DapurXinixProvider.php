<?php

namespace Dapurxinix\Provider;



class DapurXinixProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        

        $d = explode(DIRECTORY_SEPARATOR.'src', __DIR__);
        $this->app->theme->addBaseDirectory($d[0], 10);

        $app->get('/upload_file', function () use ($app) {
        	$this->uploadFile($app);

        });

        $app->post('/upload_file', function () use ($app) {
        	$this->uploadFile($app);

        });

    }


    private function uploadFile($app){

    	$base_dir  = $this->options['Upload_Directory'];
        $bucket = "";
        $path = $base_dir . '/';

        if(!empty($_GET['bucket'])){
            $path .= $_GET['bucket'] .'/';
            $bucket = $_GET['bucket'].'/';
        }
		
		

		if (!file_exists($path)) {
		    mkdir($path, 0766, true);
		}

		$uploaded = array();
		foreach ($_FILES as $k => $v) {
			$tmp_file = $_FILES[$k]['tmp_name'];

		    $upload = move_uploaded_file($tmp_file, $path.$v['name']);

		    $uploaded[] = array('filename' => $v['name'],'path'=>$bucket) ;
		}

        
        $app->response->data($uploaded);

		

    }


}
