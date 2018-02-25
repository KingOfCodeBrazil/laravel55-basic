@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.roles.index') }}">Roles</a></li>
      <li class="active">View Role</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Role</h3>
        </div>
        <div class="panel-body">
        
                @include('home.roles.show_fields')

                <a href="{{ route('home.roles.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection