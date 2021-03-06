<?php
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$collector = new RouteCollector();
$collector->get('/', ['workspace\controllers\MainController', 'actionIndex']);
$collector->get('/send-form', ['workspace\controllers\SendController', 'actionIndex']);
$collector->get('/send', ['workspace\controllers\SendController', 'actionSend']);
$collector->get('products', function(){
    return 'Create Product';
});
$collector->get('/items/{id}', ['workspace\controllers\MainController', 'actionItems']);

return $collector;