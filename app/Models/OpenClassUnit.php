<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenClassUnit extends Model
{
    protected $table = 'open_class_units';
    
    protected $fillable = [
        'title',
    ];
}
