<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    protected $guard = "teacher";

    protected $table = 'teachers';
    protected $guarded = [];
    protected $translatable =['name'];

    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'Specialization_id', 'id');
    }
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'Gender_id', 'id');
    }
    public function Sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }
 
}
