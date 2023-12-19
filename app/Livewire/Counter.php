<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $message = "";
 
    
    public function add()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
