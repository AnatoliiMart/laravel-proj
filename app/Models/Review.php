<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    public $fillable = ['name', 'review', 'book_id'];
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
