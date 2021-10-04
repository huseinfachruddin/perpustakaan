<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Content extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_content');
    }
}
