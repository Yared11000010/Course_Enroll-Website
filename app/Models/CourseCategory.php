<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $table="course_category";

    public function courses(){
        return $this->belongsTo(Course::class, 'id', 'category_id');
    }
}
