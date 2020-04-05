<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Questionnaire extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['has_filled', 'number_of_questions'];
    protected $with = ['questions'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getHasFilledAttribute()
    {
        $filled = FilledQuestionnaire::whereQuestionnaireId($this->id)
            ->whereUserId(Auth::user()->id)
            ->first();
        if ($filled) {
            return true;
        }
        return false;
    }

    public function getNumberOfQuestionsAttribute()
    {
        return $this->questions()->count();
    }
}
