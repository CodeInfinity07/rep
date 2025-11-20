<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'password',
        'type',
        'parent_id',
        'downline_share',
        'is_active',
        'phone',
        'reference',
        'notes',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'downline_share' => 'decimal:2',
        ];
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function getAllowedChildTypes(): array
    {
        return match($this->type) {
            'owner' => ['admin', 'bettor'],
            'admin' => ['supermaster', 'bettor'],
            'supermaster' => ['master', 'bettor'],
            'master' => ['bettor'],
            'bettor' => [],
            default => [],
        };
    }

    public function canCreateUserOfType(string $type): bool
    {
        return in_array($type, $this->getAllowedChildTypes());
    }

    public function getMaxDownlineShare(): float
    {
        if ($this->type === 'bettor' || $this->type === 'master') {
            return 0;
        }
        return $this->downline_share ?? 0;
    }
}
