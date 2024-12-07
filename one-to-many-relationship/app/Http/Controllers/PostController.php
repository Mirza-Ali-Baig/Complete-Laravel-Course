<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    public function create()
    {
        Post::create([
            'title' => "Post Title",
            'body' => "Post Body",
            'user_id' => 1
        ]);
        return "Post created";
    }

    public function getPostsWithUser()
    {
        return Post::with('user')->get();
    }
}
