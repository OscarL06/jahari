<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'level',
        'time',
        'sort_order',
    ];

    public function materials() {
        return $this->hasMany(Material::class)->orderBy('sort_order');
    }

    public function video() {
        return $this->hasOne(Material::class)->orderBy('sort_order');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
