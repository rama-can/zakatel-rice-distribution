<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiceOut extends Model
{
    use HasFactory;

    protected $table = 'rice_out';

    protected $fillable = [
        'rice_distribution_id'
    ];

    public function riceDistribution()
    {
        return $this->belongsTo(RiceDistribution::class, 'rice_distribution_id');
    }
}
