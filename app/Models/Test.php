<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['test_name', 'test_type', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function testQuestions()
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function userTestHistories()
    {
        return $this->hasMany(UserTestHistory::class);
    }
}
