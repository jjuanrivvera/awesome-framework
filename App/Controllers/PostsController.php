<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Post;

/**
 * PostsController
 */
class PostsController extends Controller
{
    /**
     * Show the index page
     * @return void
     */
    public function indexAction()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }
    
    /**
     * Show the add page
     * @return void
     */
    public function addAction()
    {
        echo get_class() . '::add()';
    }
 
    /**
     * Show the edit page
     * @return void
     */
    public function editAction()
    {
        echo 'Hello from the edit action in the PostsController class';
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
