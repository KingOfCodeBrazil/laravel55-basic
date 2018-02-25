@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active">Users</li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <h3>Users</h3>
            <br>
            
            <div class="row">
                <div class="col-sm-2">
                    <a href="{{ route('home.users.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> User</a>
                </div>
                <div class="col-sm-10">
                    <form action="">
                        <div class="input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search..." value="{{ $search }}">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <br>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th class="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                            <td class="text-right">
                            {!! Form::open(['route' => ['home.users.destroy', $user->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('home.users.show', $user->id) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('home.users.edit', $user->id) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure to delete this item?')"]) !!}
                                </div>
                            {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {!! $users->render() !!}
        </div>
    </div>

</div>
@endsection