@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.brands.index') }}">Marcas</a></li>
      <li class="active">View Marca</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Marca</h3>
        </div>
        <div class="panel-body">
        
                @include('home.brands.show_fields')

                <a href="{{ route('home.brands.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection