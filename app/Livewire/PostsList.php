<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsList extends Component
{
    protected $listeners=['toggleFollow'=>'$refresh'];
    public function getPostsProperty()
    {
        $ids=auth()->user()->following()->wherePivot('confirmed',true)->get()->pluck('id');
        return Post::whereIn('user_id',$ids)->latest()->get();
    }
    public function render()
    {
        return view('livewire.posts-list');
    }
}
