<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['option_text', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function userTestQuestions()
    {
        return $this->hasMany(UserTestQuestion::class);
    }
}
