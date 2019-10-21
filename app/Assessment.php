<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'language'
    ];

    protected $appends = [
        'question_count'
    ];

    public function getQuestionCountAttribute() {
        return $this->questions()->count();
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
