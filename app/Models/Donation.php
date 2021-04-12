<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice',
        'campaign_id',
        'donatur_id',
        'amount',
        'pray',
        'status',
        'snap_token'
    ];

    /**
     * Get the campaign that owns the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Get the Donatur that owns the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Donatur(): BelongsTo
    {
        return $this->belongsTo(Donatur::class);
    }

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d-M-Y');
    }

    public function getUpdatedAtAttribute($date){
        return Carbon::parse($date)->format('d-M-Y');
    }
}
