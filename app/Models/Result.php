<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    protected $fillable = [
        'bet_id',
        'user_id',
        'event_id',
        'event_name',
        'market_id',
        'market_name',
        'market_type',
        'client_ref',
        'selection_name',
        'odds',
        'stake',
        'result',
        'profit_loss',
        'settled',
        'placed_at',
        'settled_at',
    ];

    protected $casts = [
        'odds' => 'decimal:2',
        'stake' => 'decimal:2',
        'profit_loss' => 'decimal:2',
        'settled' => 'integer',
        'placed_at' => 'datetime',
        'settled_at' => 'datetime',
    ];

    public function bet(): BelongsTo
    {
        return $this->belongsTo(Bet::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
