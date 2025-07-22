<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $table = 'document_categories';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'status',
        'depth'
    ];

    public function parent()
    {
        return $this->belongsTo(NewsCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NewsCategory::class, 'parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            $category->depth = $category->parent ? $category->parent->depth + 1 : 0;
        });
    }
}
