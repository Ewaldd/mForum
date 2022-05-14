<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = ['name','slug', 'parent_id'];

    public function sub_categories() {
        return $this->hasMany(Category::class, 'category_parent_id')->withCount('posts');
    }

    public function posts() {
        return $this->hasMany(Post::class)->where('post_parent_id', '=', null);
    }

}
