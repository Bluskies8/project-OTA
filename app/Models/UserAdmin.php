<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin extends Authenticatable
{
    use HasApiTokens,HasFactory;
    protected $guarded = ['id'];

    public function role()
    {
        return $this->hasOne(AdminRole::class, "type","admin_role_id");
    }
}
