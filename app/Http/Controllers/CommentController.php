<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        Comment::create([
            'text' => $request->input('text'),
            'user_id' => Auth::id(),
            'task_id' => $request->input('task_id'),
        ]);

        return redirect()->back();
    }
    public function delete(Comment $comment)
    {

    }
}















