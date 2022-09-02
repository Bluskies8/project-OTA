<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserFlightBook;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFlightBookGroup extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    public function UserFlightBook()
    {
        return $this->hasMany(UserFlightBook::class,'group_id');
    }
}
