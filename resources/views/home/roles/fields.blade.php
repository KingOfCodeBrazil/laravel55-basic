<div class="form-group col-sm-12">
    {{ Form::label('name', 'Name *') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-sm-12">
    <h4>Assign Permissions</h4>

    @foreach ($permissions as $permission)
        {{ Form::checkbox('permissions[]',  $permission->id ) }}
        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
    @endforeach
</div>