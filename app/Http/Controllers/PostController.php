<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required'],
            'image' => ['required','mimes:png,jpg,jpeg,gif']
        ]);
        $image = $request['image']->store('posts' , 'public');
        $data['image'] = $image;
        $data['slug'] = Str::random(10);
        auth()->user()->posts()->create($data); 
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
