<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name', 'level_id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
