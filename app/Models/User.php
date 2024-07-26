<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'bagian',
        'role_id',
        'fist_name',
        'last_name'
    ];

    public function role():BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
