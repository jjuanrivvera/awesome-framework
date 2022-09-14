<?php

namespace App\Controllers;

use Awesome\View;
use Awesome\Request;
use Awesome\Response;
use Awesome\Validator;
use Awesome\Controller;
use App\Contracts\PostContract;
use Awesome\Exceptions\ValidationException;

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
     * @var PostContract
     */
    protected $post;

    /**
     * PostsController constructor
     * @param Request $request
     * @param View $view
     * @param PostContract $post
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
    public function index()
    {
        $posts = $this->post->all();

        return new Response($posts);
    }

    /**
     * Show the edit page
     * @return Response
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function edit()
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

    /**
     * Create post
     * @param Request $request
     * @return Response
     * @throws ValidationException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getBody(), true);

        $rules = [
            'title' => 'required|unique:posts',
            'content' => 'required'
        ];

        $validator = new Validator($data, $rules);

        $response = Response::create()->setHeaders([
            'Content-Type' => 'application/json',
            'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
            'X-XSS-Protection' => '1; mode=block',
            'X-Content-Type-Options' => 'nosniff',
            'X-Frame-Options' => 'SAMEORIGIN',
            'Cache-Control' => 'no-cache, no-store, must-revalidate; private'
        ]);

        if (!$validator->validate()) {
            throw new ValidationException($validator->getErrors());
        }
        
        $post = $this->post->create($data);

        $response->setStatusCode(Response::HTTP_CREATED)
            ->setContent($post)
            ->send();

        return $response;
    }

    /**
     * Update post
     * @param $id
     * @param Request $request
     * @return Response
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function update($id, Request $request)
    {
        $data = json_decode($request->getBody(), true);

        $posts = $this->post->update($id, $data);

        return Response::create($posts);
    }

    /**
     * Delete post
     * @param $id
     * @return Response
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function delete($id)
    {
        $this->post->delete($id);

        return Response::create('', Response::HTTP_NO_CONTENT);
    }
}
