@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.products.index') }}">Produtos</a></li>
      <li class="active">View Produto</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Produto</h3>
        </div>
        <div class="panel-body">
        
                @include('home.products.show_fields')

                <a href="{{ route('home.products.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection