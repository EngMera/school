<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations ;
    protected $guard = "student";
    
    protected $table = 'students';
    protected $guarded = [];
    protected $translatable = ['name'];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id','id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class,'Grade_id','id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id','id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function Nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id','id');
    }
    public function myparent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id','id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class,'student_id','id');
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id','id');
    }
}
