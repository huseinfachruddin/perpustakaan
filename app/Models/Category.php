<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent',
    ];

    public function content()
    {
        return $this->belongsToMany(Content::class, 'category_content');
    }

    public function children()
    {
        return $this->hasMany(Self::class,'parent');
    }

    public function parent()
    {
        return $this->belongsTo(Self::class,'parent');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($category) { // before delete() method call this
             $category->children()->each(function($children) {
                $children->delete();
             });
        });
    }
}
