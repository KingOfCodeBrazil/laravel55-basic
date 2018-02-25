@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="{{ route('home.users.index') }}">Users</a></li>
        <li class="active">New User</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>New User</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['route' => 'home.users.store', 'id' => 'user-form']) !!}    
        
                @include('home.users.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection