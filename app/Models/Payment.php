<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'date',
        'student_id',
        'amount',
        'description',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
}
