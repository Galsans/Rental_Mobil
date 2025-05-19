<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the category that owns the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the booking for the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
