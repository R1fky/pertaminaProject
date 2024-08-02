<?php

namespace App\Models;

use App\Models\CategoryTugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    public function category():BelongsTo {
        return $this->belongsTo(CategoryTugas::class);
    }
}
