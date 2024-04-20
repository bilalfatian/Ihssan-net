<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    
    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }
    
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    
}
