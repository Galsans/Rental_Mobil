<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the kendaraan that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode_unik = self::generateUniqueCode();
        });
    }

    private static function generateUniqueCode()
    {
        $code = strtoupper(Str::random(5));
        while (self::where('kode_unik', $code)->exists()) {
            $code = strtoupper(Str::random(5));
        }
        return $code;
    }


    public function isOverdue()
    {
        return Carbon::parse($this->tanggal_akhir)->isPast();
    }
}
