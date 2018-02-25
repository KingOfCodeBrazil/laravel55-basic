<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RoleBase;
use Spatie\Permission\Contracts\Role as RoleContract;
use Nicolaslopezj\Searchable\SearchableTrait as Searchable;

class Role extends RoleBase {
    
    use Searchable;

    protected $fillable = [
        'name',
        'guard_name'
    ];

    protected $searchable = [
        'columns' => [
            'roles.name' => 10,
        ]
    ];

    public function savePermissions($permissionsOnlyIds)
    {
        $permissions = Permission::find($permissionsOnlyIds);
        $this->syncPermissions($permissions);
    }

}