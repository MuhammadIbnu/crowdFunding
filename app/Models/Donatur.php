<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'password',
        'avatar'
    ];

    protected $hide =[
        'password',
        'remember_token'
    ];
    
    /**
     * Get all of the donation for the Donatur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function getAvatarAttribute($avatar){
        if ($avatar != null) {
            # code...
            return asset('Storage/donaturs/'.$avatar);
        }else {
            # code...
            return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100';
        }
    }
}
