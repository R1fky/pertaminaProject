<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bulan extends Model
{
    use HasFactory;

    public function tugas():HasMany {
        return $this->hasMany(Tugas::class, 'bulan_id');
    }
}
