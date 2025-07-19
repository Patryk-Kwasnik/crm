<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'parent_id',
        'model_type',
        'model_id',
        'path',
        'type',
        'mime_type',
        'alt',
        'size',
        'sort'
    ];

    public function parent()
    {
        return $this->belongsTo(Image::class, 'parent_id');
    }

    public function thumbnails()
    {
        return $this->hasMany(Image::class, 'parent_id');
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function fullUrl(): string
    {
        return Storage::disk('public')->url($this->path);
    }


}
