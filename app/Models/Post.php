<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug','content', 'author_id', 'category_id', 'post_parent_id'];

    public function replies(){
        return $this->hasMany(Post::class, 'post_parent_id');
    }
   public function user(){
        return $this->belongsTo(User::class, 'author_id');
   }
}
