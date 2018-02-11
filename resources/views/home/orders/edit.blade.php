@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.orders.index') }}">Pedidos</a></li>
      <li class="active">Edit Pedido</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Pedido</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($order, ['route' => ['home.orders.update', $order->id], 'method' => 'patch', 'files' => true, 'id' => 'order-form']) !!}    
        
                @include('home.orders.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection