<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table="books";

    public function isAuthorizedForCurrentUser()
    {
        // Check if the authenticated user has purchased this book
        return $this->orders()->where('user_id', auth()->id())->exists();
    }

    public function orders()
    {
        return $this->hasMany(PdfOrder::class, 'pdf_id');
    }
}
