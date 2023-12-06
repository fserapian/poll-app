<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $options = ['First', 'Second'];
    public $title;

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function submitForm()
    {
        $this->options[] = '';
    }
}
