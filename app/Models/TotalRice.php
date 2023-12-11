<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalRice extends Model
{
    use HasFactory;

    protected $table = 'total_rices';

    protected $fillable = [
        'total'
    ];
}