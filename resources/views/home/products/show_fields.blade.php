
@if(isset($product))
    @if($product->image)
        <div class="form-group">
            {{ Form::label('image', 'Image') }}
        </div>
        <div class="form-group col-xs-12 col-sm-12 text-left">
            <img src="{{ asset($product->getImagePath('image', 'thumb')) }}" width="150" style="margin: 10px">
        </div>
    @endif
@endif

<div class="form-group">
    {{ Form::label('name', 'Nome') }}
    <p>{{ $product->name }}</p>
</div>

<div class="form-group">
    {{ Form::label('type', 'Tipo') }}
    <p>{{ $product->type }}</p>
</div>
