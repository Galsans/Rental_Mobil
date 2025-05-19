<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        // Aktifkan ini pada saat sudah migrate seeder

        // static::creating(function ($model) {
        //     $model->{$model->getKeyName()} = (string) Str::uuid();
        // });
    }
    protected $guarded = ['id'];
}
