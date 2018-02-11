@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.orders.index') }}">Pedidos</a></li>
      <li class="active">View Pedido</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>View Pedido</h3>
        </div>
        <div class="panel-body">
        
                @include('home.orders.show_fields')

                <a href="{{ route('home.orders.index') }}" class="btn btn-default">Back</a>
            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection