<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return Comments::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'post_id' => ['required', 'exists:posts'],
            'like' => ['required', 'integer'],
            'dislike' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        return Comments::create($data);
    }

    public function show(Comments $comments)
    {
        return $comments;
    }

    public function update(Request $request, Comments $comments)
    {
        $data = $request->validate([
            'post_id' => ['required', 'exists:posts'],
            'like' => ['required', 'integer'],
            'dislike' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        $comments->update($data);

        return $comments;
    }

    public function destroy(Comments $comments)
    {
        $comments->delete();

        return response()->json();
    }
}
