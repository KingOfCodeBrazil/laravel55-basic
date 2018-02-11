@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.clients.index') }}">Clientes</a></li>
      <li class="active">Edit Cliente</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Cliente</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($client, ['route' => ['home.clients.update', $client->id], 'method' => 'patch', 'files' => true, 'id' => 'client-form']) !!}    
        
                @include('home.clients.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection