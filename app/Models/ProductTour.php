<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ProductTour extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public static function getAlive() {
        $date = Carbon::today()->format('Y-m-d H:i:s');
        $data = self::whereDate('valid_date_start', '<=',$date)->whereDate('valid_date_end', '>=',$date);
        return $data;
    }
    public static function wishlist(){

    }
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag','taggable');
    }
    public function highlights()
    {
        return $this->hasMany(ProductTourHighlight::class, "tour_id", "id");
    }
    public function itinenaries()
    {
        return $this->hasMany(ProductTourItinenary::class, "tour_id", "id");
    }
    public function photos()
    {
        return $this->hasMany(ProductTourPhoto::class, "tour_id", "id");
    }
    public function includes()
    {
        return $this->hasMany(ProductTourInclude::class, "tour_id", "id");
    }
    public function excludes()
    {
        return $this->hasMany(ProductTourExclude::class, "tour_id", "id");
    }
    public function availableDates()
    {
        return $this->hasMany(ProductTourDate::class, "tour_id", "id");
    }
    public function countryTags()
    {
        return $this->hasMany(ProductTourCountrytag::class, "tour_id", "id");
    }
    public function feedbacks()
    {
        return $this->hasMany(ProductTourFeedback::class, "tour_id", "id");
    }
    public function cancelPolicies()
    {
        return $this->hasMany(ProductTourCancelpolicy::class, "tour_id", "id");
    }
    public function thermsConds()
    {
        return $this->hasMany(ProductTourThermcond::class, "tour_id", "id");
    }
}
