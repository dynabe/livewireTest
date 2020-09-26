<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CRUDS;
use Livewire\WithFileUploads;

class CRUD extends Component
{
    use WithFileUploads;

    public $name;
    public $photo;
    public $message;
    public $idcrud;
    public $nameEdit;
    public $photoEdit;

    protected $rules = [ 
        'name' => 'required|min:5',
        'photo' => 'nullable|image'
        ];

    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->cruds = CRUDS::all()->sortDesc();
        return view('livewire.c-r-u-d');
    }
    
    public function create()
    {
        $this->validate();

        if (!empty($this->photo))
        {
            $urlImage = $this->photo->store('images', 'public');

            $crud = new CRUDS;
                $crud->name = $this->name;
                $crud->photo = $urlImage;
            $crud->save();

        } else {
            $crud = new CRUDS;
                $crud->name = $this->name;
                $crud->photo = 'nothing';
            $crud->save();
        }

        

        $this->emit('reviewSectionRefresh');
        $this->resetForm();
        $this->message = 'ADDED';
    }

    public function resetForm() {
        $this->name = '';
        $this->photo = '';
    }

    public function edit($id)
    {

        $crud = CRUDS::find($id);

        $this->idcrud = $crud->id;
        $this->nameEdit = $crud->name;
        $this->photoEdit = $crud->photo;

        $this->dispatchBrowserEvent('openEditModal');
    }

    public function editSave($id)
    {

        $crud = CRUDS::find($id);
            $crud->name = $this->nameEdit;
            $crud->photo = $this->photoEdit;
        $crud->save();

        $this->emit('reviewSectionRefresh');
        $this->resetForm();
        $this->dispatchBrowserEvent('closeEditModal');
        $this->message = 'UPDATED';

    }
    
    public function delete($id)
    {
        CRUDS::where('id', $id)->delete();
        $this->message = 'DELETED';

    }

    
}
