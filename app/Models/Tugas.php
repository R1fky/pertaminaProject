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
        'category_id',
        'status',
        'bulan_id',
        'document',
        'user_id'

    ];
    public function category():BelongsTo {
        return $this->belongsTo(CategoryTugas::class);
    }

    public function pic():BelongsTo {
        return $this->belongsTo(PicCategory::class);
    }

    public function bulan():BelongsTo {
        return $this->belongsTo(Bulan::class);
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
    
}
