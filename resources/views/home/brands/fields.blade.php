

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('name', 'Nome') !!} <b class="asterisk required">*</b>
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('email', 'E-mail') !!} <b class="asterisk required">*</b>
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>



<div class="col-sm-12">
    <h4>Telefones</h4>

    <brand-phones
        form="brand-form" 
        items="{{ isset($brand) ? $brand->phones : '[]' }}">
    </brand-phones>
</div>
