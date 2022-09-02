<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag','taggable');
    }
    public function photos()
    {
        return $this->hasMany(EventPhoto::class, "event_id", "id");
    }
}
