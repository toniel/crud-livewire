@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Contacts</h3>
                    </div>
                    <div class="card-body">
                        <livewire:contact-create>
                        <livewire:contact-index>
                    </div>
                </div>

           </div>
        </div>
    </div>
@endsection
