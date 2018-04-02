@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('success'))
            <div class="alert alert-primary" role="alert">
              {{ session()->get('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Persons Management
                    <a href="{{ route('persons.create') }}" class="btn btn-primary btn-sm float-right">New Person</a>
                </div>
                <div class="card-body">
                    <list-persons></list-persons>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
