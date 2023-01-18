<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMovie extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'movie_image'];
    public function movies()
    {
        return $this->belongsTo(Movie::class, "movie_id", 'id');
    }
}
