<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['Section_Name'];

    protected $table = 'sections';
    protected $fillable = [
        'Section_Name',
        'Status',
        'Grade_id',
        'Class_id'
    ];
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Class_id','id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section');
    }
    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }
}
