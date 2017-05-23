<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenClass extends Model
{
    protected $table = 'open_classes';

    protected $fillable = [
        'title',
        'label',
        'abstract_content',
        'video_url',

        'teacher_id',
        'unit_id',
        'chapter_number',
        'section_number',
    ];

    public function teacher(){
        return $this->belongsTo(Customer::class, 'teacher_id');
    }

    public function unit(){
        return $this->belongsTo(OpenClassUnit::class);
    }
}
