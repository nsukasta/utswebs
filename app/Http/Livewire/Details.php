<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;

class Details extends Component
{

    public $det;


    public function render()
    {
        $this->det = Member::orderBy('created_at', 'DESC')->get();
        return view('livewire.details');
    }
}