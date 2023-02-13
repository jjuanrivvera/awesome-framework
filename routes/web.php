<?php

use Awesome\Router;
use Awesome\Http\Request;

Router::get('/', 'HomeController@index');

Router::get('/posts', 'PostsController@index');
Router::post('/posts', 'PostsController@create');
Router::get('/posts/{id:\d+}/edit', 'PostsController@edit');
Router::put('/posts/{id:\d+}', 'PostsController@update');
Router::delete('/posts/{id:\d+}', 'PostsController@delete');
Router::get('/test/{id:\d+}', function (Request $request, $id) {
    print_r($id);
    print_r($request);
});
