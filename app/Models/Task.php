<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'nr',
        'name',
        'text',
        'status',
        'priority',
        'id_user_assigned',
        'id_author',
        'start_date',
        'end_date',
        'execution_time',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    /**
     * Użytkownik przypisany do zadania.
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_assigned');
    }

    /**
     * Autor (twórca) zadania.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_author');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TaskComment::class);
    }

    protected static function booted(): void
    {
        static::created(function (Task $task) {
            if (!$task->nr) {
                $task->nr = 'T/' . str_pad($task->id, 4, '0', STR_PAD_LEFT);
                $task->saveQuietly();
            }
        });
    }
}
