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
        $image=$this->image->store('temp');
        $this->dispatch('openModal','filters-modal',['image'=>$image]);
    }
    public function render()
    {
        return view('livewire.create-post-modal');
    }
}
