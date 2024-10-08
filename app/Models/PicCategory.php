<?php

namespace App\Models;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PicCategory extends Model
{
    use HasFactory;

    protected $fillabel = [
        'name_pic',
    ];

    public function pic():HasMany {
        return $this->hasMany(Tugas::class, 'pic_id');
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class, 'pic_id');
    }


}
