<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question_text', 'subject_id', 'chapter_id', 'level_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function testQuestions()
    {
        return $this->hasMany(TestQuestion::class);
    }
}
