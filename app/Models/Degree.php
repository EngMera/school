<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $table = 'degrees';
    protected $fillable = [
        'quizz_id',
        'student_id',
        'question_id',
        'score',
        'abuse',
        'date',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function quizze()
    {
        return $this->belongsTo(Quizz::class, 'quizz_id');
    }
}
