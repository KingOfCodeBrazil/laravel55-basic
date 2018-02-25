@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.permissions.index') }}">Permissions</a></li>
      <li class="active">View Permission</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Permission</h3>
        </div>
        <div class="panel-body">
        
                @include('home.permissions.show_fields')

                <a href="{{ route('home.permissions.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection