<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $this->authorize('list', Permission::class);

        $search = $request->get('search', '');
        $permissions = Permission::search($search)->paginate(10);

        return view('home.permissions.index')
            ->with('permissions', $permissions)
            ->with('search', $search);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $this->authorize('create', Permission::class);

        $roles = Role::all();
        return view('home.permissions.create')->with('roles', $roles);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);

        $data = $this->validate($request, [
            'name' => 'required|max:64',
            'roles' => 'array'
        ]);

        $permission = Permission::create($data);
        $permission->saveRoles($request->roles);

        return redirect()->route('home.permissions.edit', $permission->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function show(Permission $permission)
    {
        $this->authorize('view', Permission::class);

        return view('home.permissions.show')->with('permission', $permission);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        $roles = Role::get();

        return view('home.permissions.edit')
            ->with('permission', $permission)
            ->with('roles', $roles);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $this->validate($request, [
            'name' => 'required|max:40',
            'roles' => 'array'
        ]);

        $permission->update($data);
        $permission->saveRoles($request->roles);

        return redirect()->route('home.permissions.edit', $permission->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();
        return back()->withSuccess('Removed successfuly!');
    }
}
