<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $user_name
 * @property string $phone
 * @property string $link
 * @property string $expired_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'phone',
        'link',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function history(): HasMany
    {
        return $this->hasMany(History::class);
    }
}
