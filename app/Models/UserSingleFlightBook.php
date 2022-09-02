<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Airline;

class UserSingleFlightBook extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function airline()
    {
        return $this->hasOne(Airline::class, "id", "airline_id");
    }

    // public function Test()
    // {
    //     $this->invoice = 'LISFGH2021101900001';
    //     $this->save();
    // }
}
