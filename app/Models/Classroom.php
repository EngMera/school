<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;
    use HasFactory;
    
    public $translatable = ['Class_Name'];

    protected $table = 'classrooms';

    protected $fillable =[
        'Class_Name',
        'Grade_id'
    ];
    
    public function Grades(){
       return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }
    public function Sections()
    {
        return $this->hasMany(Section::class , 'Class_id','id');
    }
}
