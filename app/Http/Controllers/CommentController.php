<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post , Request $request)
    {
        $data = $request->validate([
            'body' => 'required'
        ]);
        $data['user_id'] = auth()->id();
        $post->comments()->create($data);
        return back();
    }
}
