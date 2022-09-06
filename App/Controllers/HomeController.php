<?php

namespace App\Controllers;

use Awesome\View;
use Awesome\Request;
use Awesome\Controller;

class HomeController extends Controller
{
    /**
     * View manager
     * @var View
     */
    protected $view;

    public function __construct(Request $request, View $view)
    {
        parent::__construct($request);

        $this->view = $view;
    }

    /**
     * Show the index page
     * @return View
     */
    public function indexAction()
    {
        return $this->view->make('Home/index.html', [
            'name' => '<h1>Bob</h1>'
        ]);
    }
}
