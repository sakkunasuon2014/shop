<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todolist extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'todolists';
    protected $fillable = [
        'title',
        'description',
        'status',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
