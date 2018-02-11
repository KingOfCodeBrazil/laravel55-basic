@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.clients.index') }}">Clientes</a></li>
      <li class="active">View Cliente</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Cliente</h3>
        </div>
        <div class="panel-body">
        
                @include('home.clients.show_fields')

                <a href="{{ route('home.clients.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection