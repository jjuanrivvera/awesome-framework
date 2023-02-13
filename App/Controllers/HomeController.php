<?php

namespace App\Controllers;

use Awesome\View;
use Awesome\Controller;
use Awesome\Http\Request;

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
    public function index()
    {
        return $this->view->make('Home/index.html');
    }
}
