<?php

use Core\Router;

Router::add('', ['controller' => 'Home', 'action' => 'index']);
Router::add('posts', ['controller' => 'PostsController', 'action' => 'index']);
Router::add('posts/add', ['controller' => 'PostsController', 'action' => 'add']);
Router::add('admin/{controller}/{action}', ['namespace' => 'Admin']);
Router::add('{controller}/{action}');
Router::add('admin/{action}/{controller}');
Router::add('{controller}/{id:\d+}/{action}');
