<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTestHistory extends Model
{
    protected $fillable = ['user_id', 'test_id', 'score', 'total_questions', 'correct_answers', 'incorrect_answers', 'time_taken'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function userTestQuestions()
    {
        return $this->hasMany(UserTestQuestion::class);
    }
}
