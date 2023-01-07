<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'type',
        'sort_order',
    ];

    public function video() {
        return $this->hasOne(Video::class);
    }

    public function slices() {
        return $this->hasMany(Slice::class)->orderBy('sort_order');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
