<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'target_donation',
        'max_date',
        'description',
        'image',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Campaign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the donation for the Campaign
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function sumDonation(){
        return $this->hasMany(Donation::class)->selectRaw('donations.campaign_id,SUM(donations.amount) as total')->where('donations.status','success')->groupBy('donations.campaign_id');

    }

    public function getImageAttribute($image){
        return asset('Storage/campaigns/'.$image);
    }
}
