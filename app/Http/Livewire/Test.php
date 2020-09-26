<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;

class Test extends Component
{
    // public $name;
    // public $phone;
    // public $message;
    // public $orders;

    // protected $listeners = [
    //     'refreshParent' => '$refresh'
    // ];

    public function render()
    {
        // return view('livewire.test', [
        //     'posts' => Orders::all()->sortDesc(),
        // ]);

        return view('livewire.test');

    }

    // public function delete($orderid)
    // {
    //     Orders::destroy($orderid);
    // }


}
