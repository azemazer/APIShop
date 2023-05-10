<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class cart extends Model
{
    use HasFactory;
    
        public function comments(): BelongsToMany
        {
            return $this->BelongsToMany(item::class);
        }
    
}

class User extends Model
{
    /**
     * Get the phone associated with the user.
     */
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

   
}


class Item extends model 
{
    public function comments(): HasMany
    {
        return $this->hasMany(cart::class);
    }
}


