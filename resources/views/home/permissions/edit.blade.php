@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="{{ route('home.permissions.index') }}">Permissions</a></li>
        <li class="active">Edit Permission</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Permission</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($permission, ['route' => ['home.permissions.update', $permission->id], 'method' => 'patch', 'files' => true, 'id' => 'permission-form']) !!}    
        
                @include('home.permissions.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection