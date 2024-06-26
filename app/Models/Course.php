<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table="courses";

    public function category(){
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id');
    }

    public function youtubeLinks()
    {
        return $this->hasMany(CourseYoutubeLink::class);
    }

    public function pdfs()
    {
        return $this->hasMany(CoursePDF::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
