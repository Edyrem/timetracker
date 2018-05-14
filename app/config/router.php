<?php

//$router = $di->getRouter();
$router = new Phalcon\Mvc\Router();
$router->add(
  '/admin/user/profile/{d+}',
  [
    'controller' => 'admin',
    'action' => 'userProfile'
  ]
);

// Define your routes here
return $router;
//$router->handle();
