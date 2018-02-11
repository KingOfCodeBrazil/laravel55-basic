@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.products.index') }}">Produtos</a></li>
      <li class="active">Edit Produto</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Produto</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($product, ['route' => ['home.products.update', $product->id], 'method' => 'patch', 'files' => true, 'id' => 'product-form']) !!}    
        
                @include('home.products.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection