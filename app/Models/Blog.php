<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'description','image', 'category_id', 'user_id'
      ];
    use HasFactory;

    // Information of category related to that blogs
    public function category(){
      return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(){
      return $this->belongsTo(User::class, 'user_id', 'id');
    }  
}

