<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'title',
        'answers',
        'right_answer',
        'score',
        'quizze_id',
    ];
    public function quizze()
    {
        return $this->belongsTo(Quizz::class,'quizze_id','id');
    }
}
