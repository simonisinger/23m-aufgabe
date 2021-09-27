<?php

namespace App\Service;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public function getAll()
    {
        return Post::all();
    }

    public function create(String $postContent){
        $user = User::all()->random();
        $post = new Post;
        $post->user_id = $user->id;
        $post->message = $postContent;
        $post->save();
        return $post;
    }
}
