<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public array $options = ['First'];
    public string $title = '';

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption(): void
    {
        $this->options[] = '';
//        $this->reset(['title']);
    }

    public function removeOption(string $index): void
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll(): void
    {
        $poll = Poll::create(['title' => $this->title]);

        foreach ($this->options as $optionName) {
            $poll->options()->create(['name' => $optionName]);
        }

        $this->reset(['title', 'options']);
    }
}
