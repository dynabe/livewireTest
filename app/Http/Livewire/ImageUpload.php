<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $avatar;

    
    public function upload() 
    {
        $this->validate([
            'avatar' => 'image',
        ]);

        $this->avatar->store('images/avatar', 'public');
    }

    public function render()
    {

        return view('livewire.image-upload');
    }


}
