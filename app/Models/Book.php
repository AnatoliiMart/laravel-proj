<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'genre_id',
    ];

    function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::words($attributes['description'], 5, '...'),
        );
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value ? $value : 'https://media.istockphoto.com/id/1454186568/vector/photo-coming-soon-no-photo-symbol-no-thumbnail-available-default-thumbnail-available-photo.jpg?s=612x612&w=0&k=20&c=StTpRk4EcrWT2Wf1WdFVsvtw-BoegbQ6KyvixJfBwr0=',
        );
    }
}
