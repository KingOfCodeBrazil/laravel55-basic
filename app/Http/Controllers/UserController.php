<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $this->authorize('list', User::class);

        $search = $request->get('search', '');
        $users = User::search($search)->paginate(10);

        return view('home.users.index')
            ->with('users', $users)
            ->with('search', $search);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::get();
        return view('home.users.create')->with('roles', $roles);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'array'
        ]);
        
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        
        $user->assignRoles($request->roles);

        return redirect()->route('home.users.edit', $user->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('home.users.show')->with('user', $user);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::get();

        return view('home.users.edit')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'min:6|confirmed|nullable',
            'roles' => 'array'
        ]);

        $data['password'] = (isset($data['password'])) ? bcrypt($data['password']) : $user->password;

        $user->update($data);
        $user->assignRoles($request->roles);

        return redirect()->route('home.users.edit', $user->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
        return back()->withSuccess('Removed successfuly!');
    }
}
