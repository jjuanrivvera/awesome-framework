<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
use Core\Request;

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
     * Before filter - called before an action method.
     */
    protected function before()
    {
        // echo '<p>' . __METHOD__ . '</p>';
    }

    /**
     * After filter - called after an action method.
     */
    protected function after()
    {
        // echo '<p>' . __METHOD__ . '</p>';
    }

    /**
     * Show the index page
     * @return View
     */
    public function indexAction()
    {
        return $this->view->renderTemplate('Home/index.html', [
            'name' => '<h1>Bob</h1>'
        ]);
    }
}
