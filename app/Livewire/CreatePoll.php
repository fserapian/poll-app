<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public array $options = ['First'];
    public string $title = '';

    protected array $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:3|max:255',
    ];

    protected array $messages = [
        'options.*' => [
            'required' => 'The option can\'t be empty',
            'min' => 'Can\'t be less than 3 characters',
            'max' => 'Can\'t be more than 255 characters',
        ],
    ];

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
//        $poll = Poll::create(['title' => $this->title]);
//
//        foreach ($this->options as $optionName) {
//            $poll->options()->create(['name' => $optionName]);
//        }
        $this->validate();

        Poll::create(['title' => $this->title])
            ->options()->createMany(
                collect($this->options)->map(function ($optionName) {
                    return ['name' => $optionName];
                })
            );

        $this->reset(['title', 'options']);
    }
}
