<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;


class Admin extends Authenticable
{
    use HasFactory;

    protected $table="admins";
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'admin__user__roles','admin_id', 'role_id');
    }

    public function hasPermissionByRole($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }
}
