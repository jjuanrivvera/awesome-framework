<?php

namespace App\Controllers\Admin;

use Awesome\Controller;

class UsersController extends Controller
{
    /**
     * Before filter - called before an action method.
     */
    protected function before()
    {
        echo '<p>' . __METHOD__ . '</p>';
    }
    
    /**
     * After filter - called after an action method.
     */
    protected function after()
    {
        echo '<p>' . __METHOD__ . '</p>';
    }
    
    public function indexAction()
    {
        echo get_class() . '::index()';
    }
}
