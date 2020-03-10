<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
            'internship_id' => 'required',
        ]);

        $comment = Comment::create($validated);
        $comment->how_long_ago = $comment->created_at->diffForHumans();

        return $comment;
    }
}
