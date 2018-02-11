
<div class="form-group col-xs-12 col-sm-12">
    {!! Form::label('brand_id', 'Marca') !!} <b class="asterisk required">*</b>
    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-xs-12 col-sm-12 text-left">
    @if(isset($product))
        @if($product->image)
            <img src="{{ asset($product->getImagePath('image', 'thumb')) }}" width="150" style="margin: 10px">
        @endif
    @endif
</div>

<div class="form-group col-xs-12">
    {!! Form::label('image', 'Image') !!} 
    {!! Form::file('image', ['accept' => 'image/*']) !!}
</div>

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('name', 'Nome') !!} <b class="asterisk required">*</b>
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('type', 'Tipo') !!} <b class="asterisk required">*</b>
    {!! Form::select('type', ['physical' => 'Físico','digital' => 'Digital','undefined' => 'Indefinido',], null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>


<div class="col-sm-12">
    <h4>Grades de Produto</h4>

    <grids
        form="product-form" 
        items="{{ isset($product) ? $product->grids : '[]' }}">
    </grids>
</div>
