<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    protected $table = 'diseases';

    protected $fillable = [
        'name_en',
        'name_zh',
    ];
}
