<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'amount',
        'comment',
    ];
    
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    
}
