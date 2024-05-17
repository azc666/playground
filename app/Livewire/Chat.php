<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    #[Validate('required|max:1000')]
    public string $body = '';

    public array $messages = [];

    public function mount()
    {
        $this->messages[] = ['role' => 'system', 'content' => 'Always start the converstation with HEY!'];
    }

    public function send()
    {

        $this->validate();

        $this->messages[] = ['role' => 'user', 'content' => $this->body];
        $this->messages[] = ['role' => 'assistant', 'content' => ''];

        $this->body = '';
        $this->messages[] = ['role' => 'system', 'content' => ''];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
