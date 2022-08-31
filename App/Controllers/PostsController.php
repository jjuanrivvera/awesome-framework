<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Controller;
use App\Models\Post;

/**
 * PostsController
 */
class PostsController extends Controller
{
    /**
     * View manager
     * @var View
     */
    protected $view;

    /**
     * Model
     */
    protected $post;

    /**
     * PostsController constructor
     */
    public function __construct(Request $request, View $view, Post $post)
    {
        parent::__construct($request);
        $this->view = $view;
        $this->post = $post;
    }

    /**
     * Show the index page
     * @return void
     */
    public function indexAction()
    {
        $posts = $this->post->all();

        $this->view->renderTemplate('Posts/index.html', [
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
        echo '<p>Route parameters: <pre>'
            . htmlspecialchars(print_r($this->request->id, true))
            . '</pre></p>';
    }
}
