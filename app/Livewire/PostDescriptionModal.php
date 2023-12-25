<?php

namespace App\Livewire;


use LivewireUI\Modal\ModalComponent;

class PostDescriptionModal extends ModalComponent
{
    public $image;
    public $description;
    public function mount($image)
    {
        $this->image=$image;
        
    }
    public function post()
    {
        dd($this->image,$this->description);
    }
    public function render()
    {
        return view('livewire.post-description-modal');
    }
}
