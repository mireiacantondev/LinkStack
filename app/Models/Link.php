<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'url', 'category_id', 'order', 'is_active'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
