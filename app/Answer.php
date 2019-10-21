<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Question;

class Answer extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'description',
        'question_id',
        'candidate_id'
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
