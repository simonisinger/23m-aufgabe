<?php

namespace App\Http\Controllers;

use App\Service\PostService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function get(PostService $postService)
    {
        return json_encode($postService->getAll());
    }

    public function create(PostService $postService)
    {

    }
}
