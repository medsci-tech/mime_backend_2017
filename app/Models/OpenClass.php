<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenClass extends Model
{
    protected $table = 'open_classes';

    protected $fillable = [
        'title',
        'tag',
        'abstract_content',
        'video_url',
        'video_app_id',
        'video_file_id',
        'video_duration',

        'teacher_id',
        'unit_id',
        'chapter_id',
        'section_number',
    ];

    public function teacher(){
        return $this->belongsTo(Customer::class, 'teacher_id');
    }

    public function chapter(){
        return $this->belongsTo(OpenClassChapter::class);
    }
}
