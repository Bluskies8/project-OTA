<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function passport()
    {
        return $this->hasOne(Passport::class, "id", "passport_id");
    }
}
