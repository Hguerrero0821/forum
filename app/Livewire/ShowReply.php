<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
public Reply $reply;
    public $body = '';

    public function postChild()
    {
        // validate
        $this->validate(['body' => 'required']);
        // create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body'      => $this->body,
        ]);
        // refresh
        $this->body = '';

    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
