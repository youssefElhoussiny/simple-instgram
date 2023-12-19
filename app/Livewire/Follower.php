<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Follower extends Component
{
    public $userId;
    protected $user;
    public function getCountProperty()
    {
        $this->user=User::find($this->userId);
        return $this->user->followers()->count();
    }
    public function render()
    {
        return view('livewire.follower');
    }
}
