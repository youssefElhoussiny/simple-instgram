<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Like extends Component
{
    public Post $post;
 
   public function toggle_like()
   {
        auth()->user()->likes()->toggle($this->post);
        $this->dispatch('likeToggled');
   }
    
    public function render()
    {
        return view('livewire.like');
    }
}
