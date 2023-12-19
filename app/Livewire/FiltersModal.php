<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class FiltersModal extends ModalComponent
{
    public $filters=['Original','Clarendon','Gingham','Moon','Perpetua'];
    public $image;
    public $filterd_image;
    public function mount($image)
    {
        $this->image=$image;
        $this->filterd_image=$this->image;
    }
    public function filter_original()
    {
        $this->filterd_image=$this->image;
    }

    public function render()
    {
        return view('livewire.filters-modal');
    }
}
