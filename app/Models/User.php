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
        'commission',
        'can_bet',
        'can_settle_pl',
        'currency',
        'max_bet_soccer',
        'max_bet_tennis',
        'max_bet_cricket',
        'max_bet_fancy',
        'max_bet_race',
        'max_bet_casino',
        'max_bet_greyhound',
        'max_bet_bookmaker',
        'credit_received',
        'credit_remaining',
        'balance',
        'cash',
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
            'can_bet' => 'boolean',
            'can_settle_pl' => 'boolean',
            'downline_share' => 'decimal:2',
            'commission' => 'decimal:2',
            'max_bet_soccer' => 'decimal:2',
            'max_bet_tennis' => 'decimal:2',
            'max_bet_cricket' => 'decimal:2',
            'max_bet_fancy' => 'decimal:2',
            'max_bet_race' => 'decimal:2',
            'max_bet_casino' => 'decimal:2',
            'max_bet_greyhound' => 'decimal:2',
            'max_bet_bookmaker' => 'decimal:2',
            'credit_received' => 'decimal:2',
            'credit_remaining' => 'decimal:2',
            'balance' => 'decimal:2',
            'cash' => 'decimal:2',
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
            'admin' => ['supermaster'],
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
