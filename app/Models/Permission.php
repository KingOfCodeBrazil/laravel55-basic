<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as PermissionBase;
use Nicolaslopezj\Searchable\SearchableTrait as Searchable;
use Spatie\Permission\Contracts\Permission as PermissionContract;

class Permission extends PermissionBase {
    
    use Searchable;

    protected $fillable = [
        'name',
        'guard_name'
    ];

    protected $searchable = [
        'columns' => [
            'permissions.name' => 10,
        ]
    ];

    public function saveRoles($roles)
    {
        $allRoles = Role::find($roles) ?? [];
        $this->syncRoles($allRoles);
    }
    
}