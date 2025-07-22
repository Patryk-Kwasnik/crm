<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'category_id',
        'uploaded_by'
    ];

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class);
    }
}
