@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
                <div class="card-header">
					Edit Person
                </div>
                <div class="card-body">
            		<edit-persons url="{{ url('persons') }}" id="{{ $id }}"></edit-persons>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
