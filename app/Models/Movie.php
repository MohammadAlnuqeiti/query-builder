<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['movie_name', 'movie_description', 'movie_genre'];


    public function image()
    {
        return $this->hasOne(ImageMovie::class, 'movie_id');
    }
}
