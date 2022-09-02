<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserFlightBookPassRecord;
use App\Models\UserFlightBookGroup;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFlightBook extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    public function UserFlightBookPassRecord()
    {
        return $this->hasMany(UserFlightBookPassRecord::class,'user_flight_book_id');
    }
    public function UserFlightBookGroup()
    {
        return $this->belongsTo(UserFlightBookGroup::class,'id');
    }
}
