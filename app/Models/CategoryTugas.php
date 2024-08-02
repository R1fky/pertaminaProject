<?php

namespace App\Models;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryTugas extends Model
{
    use HasFactory;
    public function tugas():HasMany {
        return $this->hasMany(Tugas::class, 'category_id');
    }
}
