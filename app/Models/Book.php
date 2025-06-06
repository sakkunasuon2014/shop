<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; // Table name
    protected $primaryKey = 'id'; // Primary key
    protected $fillable = ['title', 'description', 'author', 'year']; // Mass assignment attributes

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
