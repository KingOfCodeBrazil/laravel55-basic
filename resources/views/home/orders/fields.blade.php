
<div class="form-group col-xs-12 col-sm-12">
    {!! Form::label('client_id', 'Cliente') !!} <b class="asterisk required">*</b>
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('name', 'Data de Abertura') !!} <b class="asterisk required">*</b>
    {!! Form::date('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-xs-12 col-sm-6">
    {!! Form::label('status', 'Status') !!} <b class="asterisk required">*</b>
    {!! Form::select('status', ['opened' => 'Aberto','closed' => 'Fechado',], null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>


<div class="col-sm-12">
    <h4>Itens do Pedido</h4>

    <order-items
        form="order-form" 
        grids="{{ isset($grids) ? $grids : '[]' }}"
        items="{{ isset($order) ? $order->items : '[]' }}">
    </order-items>
</div>
