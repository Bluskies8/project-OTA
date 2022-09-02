<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airline extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    public static function getAirlinewithLogo($code)
    {
        $data =  self::where('code', $code)->first();
        $data->logo_square = env('APP_URL').'/api/airline/imgq/'.$data->id;
        $data->logo_rect = env('APP_URL').'/api/airline/imgr/'.$data->id;
        return $data;
    }

}
