<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Assessment;
use App\Answer;

class Candidate extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'email',
        'assessment_id',
        'token'
    ];

    protected $appends = [
        'submitted_at'
    ];

    public function getSubmittedAtAttribute() {
        $answer = $this->answers->first();

        if (!$answer) {
            return null;
        }

        return $answer->created_at;
    }

    public function assessment() {
        return $this->belongsTo(Assessment::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
