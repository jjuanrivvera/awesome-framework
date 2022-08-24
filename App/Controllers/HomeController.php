<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
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

    public function indexAction()
    {
        // echo get_class() . '::index()';
        View::renderTemplate('Home/index.html', [
            'name' => '<h1>Bob</h1>'
        ]);
    }
}