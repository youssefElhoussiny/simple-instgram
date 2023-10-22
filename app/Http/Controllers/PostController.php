<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ids = auth()->user()->following()->wherePivot('confirmed' , true)->get()->pluck('id')->flatten()->toArray();
        $posts = Post::whereIn('user_id' , $ids)->latest()->get();

        $suggested_users = auth()->user()->suggested_users();

        return view('posts.index' , compact(["posts" , "suggested_users"]));
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
        // dd($post->likes());
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update' , $post);
        return view('posts.edite' , compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update' , $post);
        $data = $request->validate([
            'description' => 'required',
            'image' => ['nullable' , 'mimes:png,jpg,jpeg,gif']
        ]);
        if($request->has('image'))
        {
            $image = $request['image']->store('posts','public');
            $data['image'] = $image;
        }
        $post->update($data);
        return redirect('/p/' . $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // dd('public/'.$post->image);
        $this->authorize('update' , $post);

        Storage::delete('public/'.$post->image);
        $post->delete();
        return redirect(url('home'));
    }


    public function explore()
    {
        $posts = Post::whereRelation('owner' , 'private_account' , '=' , 0)
                    ->whereNot('user_id',auth()->id())
                    ->simplePaginate(12);
        return view('posts.explore' , compact('posts'));
    }
}
