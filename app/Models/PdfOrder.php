<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfOrder extends Model
{
    use HasFactory;
    protected $table="pdf_orders";

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function pdf(){
        return $this->belongsTo(Book::class, 'pdf_id', 'id');
    }
}
