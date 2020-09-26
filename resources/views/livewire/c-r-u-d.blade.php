<div>
    <div class="mx-auto col-lg-6">

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="m-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if ($message)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button wire:click="$set('message', null)" type="button" class="close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <label for="name">Name</label>
        <input wire:model="name" type="text" class="form-control">

        <label for="photo">photo</label>
        <input wire:model="photo" type="file" class="form-control-file">

        <button wire:click="create" class="mt-3 btn btn-primary">Send</button>

    </div>

    

    <div class="mx-auto col-lg-11 mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>photo</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->cruds as $crud)
        <tr>
            <td>{{ $crud->id }}</td>
            <td>{{ $crud->name }}</td>
            <td><img src="/{{ $crud->photo }}" height="70px" alt=""></td>
            <td><button wire:click="edit({{ $crud->id }})" class="btn btn-success">Edit</button></td>
            <td><button wire:click="delete({{ $crud->id }})" class="btn btn-danger">Delete</button></td>
        </tr>

                @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="openEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               
                <label for="name">Name</label>
                <input wire:model.defer="nameEdit" type="text" class="form-control" value="{{ $this->name }}">

                <label for="photo">photo</label>
                <input wire:model.defer="photoEdit" type="text" class="form-control" value="{{ $this->photo }}">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button wire:click="editSave({{ $this->idcrud }})" class="btn btn-primary">Save Changes</button>
            </div>
          </div>
        </div>
      </div>



</div>

