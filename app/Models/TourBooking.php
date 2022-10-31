<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBooking extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


    public function detail()
    {
        return $this->hasMany(TourPassanger::class, "tour_bookings_id", "id");
    }
    public function customer()
    {
        return $this->hasOne(Customer::class, "id", "user_id");
    }
    public function tour()
    {
        return $this->hasOne(ProductTour::class, "id", "product_tour_id");
    }
    public function tourdate()
    {
        return $this->hasOne(ProductTourDate::class, "id", "product_tour_date_id");
    }
}
