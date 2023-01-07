<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Course, Material};

class CategoriesController extends Controller
{
    public function categories(){

        $categories = Category::orderBy('sort_order')->get();

        return view('courses.categories', compact('categories'));
    }

    public function courses($id){
        
        $course = Course::with('materials')->where('id', $id)->first();

        return view('courses.courses', compact('course', 'id'));
    }

    public function lessons($id) {
        
        $lesson = Material::with('video', 'slices')->where('id', $id)->first();

        return view('courses.lessons', compact('lesson', 'id'));
    }
}