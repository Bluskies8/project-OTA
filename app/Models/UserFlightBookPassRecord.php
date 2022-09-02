<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserFlightBook;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFlightBookPassRecord extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    public function UserFlightBook()
    {
        return $this->belongsTo(UserFlightBook::class,'id');
    }
    public function userID()
    {
        return $this->belongsTo(User::class,'id');
    }
}
