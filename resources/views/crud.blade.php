@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('CRUD') }}</div>

                <div class="card-body">
                   
                    @livewire('c-r-u-d')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
