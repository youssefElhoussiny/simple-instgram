<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreatePostModal extends ModalComponent
{
    use WithFileUploads;

    public $image;
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
    public function save_temp()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($this->image) {
            $image=$this->image->store('posts', 'public');
            // $this->dispatch('openModal','filters-modal',['image'=>$image]);
            $this->dispatch('openModal','post-description-modal',['image'=>$image]);
        } else {

        }
        $this->image = null;
    }
   
    public function render()
    {
        return view('livewire.create-post-modal');
    }
}
