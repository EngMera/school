<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use  App\Models\Section;

class Grade extends Model
{
    
    
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $table = 'grades';
    protected $fillable = [
        'Name',
        'Notes'
    ];

    public function Sections()
    {
        return $this->hasMany(Section::class , 'Grade_id','id');
    }
}
