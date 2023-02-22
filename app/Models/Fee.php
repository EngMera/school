<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['title'];
    protected $table = 'fees';
    protected $fillable = [
        'title',
        'amount',
        'Grade_id',
        'Classroom_id',
        'description',
        'year',
        'Fee_type',
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class,'Grade_id','id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id','id');
    }
}
