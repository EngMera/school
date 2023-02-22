<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $table = 'receipts';
    protected $fillable = [
        'date',
        'student_id',
        'Debit',
        'description',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
