<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bet extends Model
{
    protected $fillable = [
        'user_id',
        'market_id',
        'event_id',
        'event_name',
        'market_name',
        'selection_name',
        'selection_id',
        'sport_type',
        'bet_type',
        'market_type',
        'odds',
        'size',
        'stake',
        'liability',
        'profit',
        'status',
        'matched_amount',
        'unmatched_amount',
        'placed_at',
        'matched_at',
        'settled_at',
    ];

    protected $casts = [
        'odds' => 'decimal:2',
        'size' => 'decimal:2',
        'stake' => 'decimal:2',
        'liability' => 'decimal:2',
        'profit' => 'decimal:2',
        'matched_amount' => 'decimal:2',
        'unmatched_amount' => 'decimal:2',
        'placed_at' => 'datetime',
        'matched_at' => 'datetime',
        'settled_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
