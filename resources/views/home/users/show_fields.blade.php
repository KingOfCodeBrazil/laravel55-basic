<div class="form-group">
    {{ Form::label('name', 'Name') }}
    <p>{{ $user->name }}</p>
</div>

<div class="form-group">
    {{ Form::label('email', 'E-mail') }}
    <p>{{ $user->email }}</p>
</div>