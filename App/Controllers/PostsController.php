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
     * @return View
     */
    public function indexAction()
    {
        $posts = $this->post->all();

        return $this->view->make('Posts/index.html', [
            'posts' => $posts
        ]);
    }
    
    /**
     * Show the add page
     * @return Response
     */
    public function addAction()
    {
        $content = get_class() . '::add()';

        $response = new Response($content);

        return $response->send();
    }
 
    /**
     * Show the edit page
     * @return Response
     */
    public function editAction()
    {
        $html = '<h1>Hello from the edit action in the PostsController class</h1>';
        $html .= '<p>Route parameters: <pre>'
            . htmlspecialchars(print_r($this->request->id, true))
            . '</pre></p>';

        $response = Response::create()
            ->setStatusCode(Response::HTTP_OK)
            ->setContent($html)
            ->setHeaders([
                'Content-Type' => 'text/html',
                'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
                'X-XSS-Protection' => '1; mode=block',
                'X-Content-Type-Options' => 'nosniff',
                'X-Frame-Options' => 'SAMEORIGIN',
                'Cache-Control' => 'no-cache, no-store, must-revalidate; private'
            ])->send();

        return $response;
    }
}
