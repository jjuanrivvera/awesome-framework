<?php

use Awesome\Router;

Router::get('', ['controller' => 'Home', 'action' => 'index']);

Router::get('posts', ['controller' => 'PostsController', 'action' => 'index']);
Router::post('posts', ['controller' => 'PostsController', 'action' => 'create']);
Router::put('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'update']);
Router::delete('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'delete']);
