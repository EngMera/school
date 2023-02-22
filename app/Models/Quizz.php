<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizz extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'quizzes';
    protected $fillable = [ 
        'name',
        'subject_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
    ];
    public $translatable = ['name'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id','id');
    }



    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }


    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id','id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id','id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id','id');
    }


    public function degree()
    {
        return $this->hasMany(Degree::class,'quizz_id');
    }
}
