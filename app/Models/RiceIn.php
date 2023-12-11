<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceIn extends Model
{
    use HasFactory;

    protected $table = 'rice_in';

    protected $fillable = [
        'quantity',
        'source',
        'contributor_name',
    ];
}