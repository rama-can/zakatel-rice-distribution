<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'key',
        'value',
    ];

    protected $casts = [
        'distribution_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('settings');
        });
    }

    public static function getValueByKey($key)
    {
        return Cache::remember('setting_' . $key, now()->addMinutes(60), function () use ($key) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : null;
        });
    }
}
