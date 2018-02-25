<div class="form-group col-sm-6">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-sm-6">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-sm-6">
    {{ Form::label('password', 'Password') }}<br>
    {{ Form::password('password', array('class' => 'form-control')) }}
</div>

<div class="form-group col-sm-6">
    {{ Form::label('password', 'Confirm Password') }}<br>
    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
</div>

<div class='form-group col-sm-12'>
    <h4>User Roles</h4>

    @foreach ($roles as $role)
        {{ Form::checkbox('roles[]',  $role->id ) }}
        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
    @endforeach
</div>