<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Table name
    protected $primaryKey = 'id'; // Primary key
    protected $fillable = ['name', 'description']; // Mass assignment 
}
