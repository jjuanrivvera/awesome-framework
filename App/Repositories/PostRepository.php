<?php

namespace App\Repositories;

use App\Models\Post;
use Core\Repository;
use App\Contracts\PostContract;

class PostRepository extends Repository implements PostContract
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
}
