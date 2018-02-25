<div class="form-group col-sm-12">
    {{ Form::label('name', 'Name *') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<br>

@if(!$roles->isEmpty())
    <div class="form-group col-sm-12">
        <h4>Assign Permission to Roles</h4>
    
        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
    </div>
@endif