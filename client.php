<?php

require_once 'vendor/autoload.php';

$request = new Rutter\Request($_SERVER);

$rutter = new Rutter\Router($request);

$rutter->get('/', function($r)
{
	echo 'rutt';
});

$rutter->get('/ciao/:id', 'asd');

$rutter->post('/', function($rutt)
{
	var_dump($rutt->getRequest());
});


try 
{
	echo $rutter->rutta();	
}
catch(Exception $e)
{
	echo $e->getMessage();
}

