<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'description', 'image_url'
    ];

    public function cart(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }
}


