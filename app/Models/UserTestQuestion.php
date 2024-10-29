<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTestQuestion extends Model
{
    protected $fillable = ['user_test_id', 'question_id', 'selected_option_id', 'time_taken', 'is_correct', 'is_attempted'];

    public function userTestHistory()
    {
        return $this->belongsTo(UserTestHistory::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOption()
    {
        return $this->belongsTo(Option::class, 'selected_option_id');
    }
}
