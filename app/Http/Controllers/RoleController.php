<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $this->authorize('list', Role::class);

        $search = $request->get('search', '');
        $roles = Role::search($search)->paginate(10);

        return view('home.roles.index')
            ->with('roles', $roles)
            ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $this->authorize('create', Role::class);

        $permissions = Permission::all();
        return view('home.roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->authorize('create', Role::class);

        $data = $this->validate($request, [
            'name'=>'required|unique:roles|max:32',
            'permissions' =>'required|array',
        ]);

        $role = Role::create($data);
        $role->savePermissions($request->permissions);

        return redirect()->route('home.roles.edit', $role->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role) 
    {
        $this->authorize('view', Role::class);

        return view('home.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role) 
    {
        $this->authorize('update', $role);

        $permissions = Permission::all();

        return view('home.roles.edit')
            ->with('role', $role)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role) 
    {
        $this->authorize('update', $role);

        $data = $this->validate($request, [
            'name'=>'required|max:32|unique:roles,name,'.$role->id,
            'permissions' =>'required|array',
        ]);
        
        $role->update($data);
        $role->savePermissions($request->permissions);

        return redirect()->route('home.roles.edit', $role->id)
            ->withSuccess('Saved successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();
        return back()->withSuccess('Removed successfuly!');
    }
}