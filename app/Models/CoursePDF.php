<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePDF extends Model
{
    use HasFactory;

    protected $table="pdfs";
    protected $fillable = [
        'file_path',
        'course_id',
    ];
}


