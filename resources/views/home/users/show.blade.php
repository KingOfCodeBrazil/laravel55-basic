@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.users.index') }}">Users</a></li>
      <li class="active">View User</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View User</h3>
        </div>
        <div class="panel-body">
        
                @include('home.users.show_fields')

                <a href="{{ route('home.users.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection