<?php

namespace App\Models;

use App\Models\PicCategory;
use App\Models\CategoryTugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tugas',
        'deskripsi',
        'frekuensi',
        'pic_id',
        'document',
        'category_id',
        'status'
    ];
    public function category():BelongsTo {
        return $this->belongsTo(CategoryTugas::class);
    }

    public function pic():BelongsTo {
        return $this->belongsTo(PicCategory::class);
    }
}
