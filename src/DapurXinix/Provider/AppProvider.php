<?php

namespace Dapurxinix\Provider;



class AppProvider extends \Bono\Provider\Provider
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
		$path = $base_dir . '/';
		

		if (!file_exists($path)) {
		    mkdir($path, 0766, true);
		}

		$uploaded = '';
		foreach ($_FILES['files']['name'] as $k => $filename) {
			$tmp_file = $_FILES['files']['tmp_name'][$k];

		    $upload = move_uploaded_file($tmp_file, $path.$filename);

		    $uploaded = $filename;
		}

		echo json_encode($uploaded);
		exit();

    }


}
