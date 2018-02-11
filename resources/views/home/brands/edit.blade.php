@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li><a href="{{ route('home.brands.index') }}">Marcas</a></li>
      <li class="active">Edit Marca</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Edit Marca</h3>
        </div>
        <div class="panel-body">
            {!! Form::model($brand, ['route' => ['home.brands.update', $brand->id], 'method' => 'patch', 'files' => true, 'id' => 'brand-form']) !!}    
        
                @include('home.brands.fields')

                <div class="form-group col-xs-12 col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}  
        </div>
    </div>

</div>
@endsection