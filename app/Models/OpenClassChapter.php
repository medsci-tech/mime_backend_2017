<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenClassChapter extends Model
{
    protected $table = 'open_class_chapters';

    protected $fillable = [
        'unit_id',
        'number',
        'title',
    ];

    public function unit(){
        return $this->belongsTo(OpenClassUnit::class);
    }
}
