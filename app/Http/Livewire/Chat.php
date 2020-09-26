<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\MyEvent; // PUSHER
use App\Models\Chat as Chats;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Chat extends Component
{
    public $message;
    public $chatMessages;

    public function getListeners()
    {
        return [
            "echo-private:user,.userMessage" => '$refresh',
        ];
    }

    public function render()
    {
        $this->chatMessages = Chats::limit(5)->orderBy('id', 'desc')->get();
        $this->chatMessages = $this->chatMessages->reverse();
        return view('livewire.chat');
    }

    public function sentMsg()
    {
        $message = Auth::user()->messages()->create([
            'message' => $this->message,
        ]);

        event(new MyEvent($this->message));
    }

}
