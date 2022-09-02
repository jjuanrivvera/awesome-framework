<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Response;
use Core\Controller;
use App\Contracts\PostContract;

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
    public function __construct(
        Request $request,
        View $view,
        PostContract $post
    ) {
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
        $html = '<h1>Hello from the edit action in the PostsController class</h1>';
        $html .= '<p>Route parameters: <pre>'
            . htmlspecialchars(print_r($this->request->id, true))
            . '</pre></p>';

        $response = new Response($html, 200, [
            'Content-Type' => 'text/html',
            'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
            'X-XSS-Protection' => '1; mode=block',
            'X-Content-Type-Options' => 'nosniff',
            'X-Frame-Options' => 'SAMEORIGIN',
            'Cache-Control' => 'no-cache, no-store, must-revalidate; private'
        ]);

        return $response->send();
    }
}
