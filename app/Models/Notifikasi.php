<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tugas_id',
        'pesan'
    ];
    
    public function user(): HasMany {
        return $this->hasMany(User::class);
    }

    public function tugas(): BelongsTo {
        return $this->belongsTo(Tugas::class);
    }
}
