<?php

namespace App\Http\Controllers;

use App\Service\PostService;

class PostsController extends Controller
{
    public function get(PostService $postService)
    {
        //$postService->getAll();
        return $postService->getAll();
    }

    public function create(PostService $postService)
    {
        return json_encode($postService->create(request()->post('tweetMessage')));
    }
}
