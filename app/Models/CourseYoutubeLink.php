<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseYoutubeLink extends Model
{
    use HasFactory;
    protected $table="course_youtube_links";
    protected $fillable = [
        'youtube_link',
        'course_id',
    ];
}
