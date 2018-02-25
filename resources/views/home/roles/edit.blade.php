@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.roles.index') }}">Roles</a></li>
      <li class="active">Edit Role</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Role</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($role, ['route' => ['home.roles.update', $role->id], 'method' => 'patch', 'files' => true, 'id' => 'role-form']) !!}    
        
                @include('home.roles.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection