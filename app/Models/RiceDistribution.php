<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RiceDistribution extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'distribution_date' => 'datetime',
    ];

    public function riceOut(): HasOne
    {
        return $this->hasOne(RiceOut::class);
    }

    public function html(): Attribute
    {
        return Attribute::get(fn () => str($this->content)->markdown());
    }
}