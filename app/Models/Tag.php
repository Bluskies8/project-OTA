<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    // public function tour()
    // {
    //     return $this->morphedByMany('App\Models\ProductTour','taggable');
    // }
    // public function attaction()
    // {
    //     return $this->morphedByMany('App\Models\ProductAttaction','taggable');
    // }
    // public function event()
    // {
    //     return $this->morphedByMany('App\Models\Event','taggable');
    // }
}
