<?php

namespace App\Service;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public function getAll(): array
    {
        $posts = Post::orderByDesc('created_at')->get(['message','created_at', 'user_id']);
        $postsArray = [];
        foreach ($posts as $index => $post){
            // Hier wird ein recht performancelastiger Weg eingeschlagen, weil eloquent sich weigert die daten des nutzers automatisch mit auszulesen
            $postsArray[] = [
                'message' => $post->message,
                'name' => User::where('id','=', $post->user_id)->get('name')->firstOrFail()->name,
                'created_at' => $post->created_at
            ];
        }
        return $postsArray;
    }

    public function create(String $postContent): array
    {
        $user = User::all()->random();
        $post = new Post;
        $post->user_id = $user->id;
        $post->message = $postContent;
        $post->save();
        return [
            'message' => $post->message,
            'name' => User::where('id','=', $post->user_id)->get('name')->firstOrFail()->name,
            'created_at' => $post->created_at
        ];
    }
}
