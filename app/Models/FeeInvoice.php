<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;
    protected $table = 'fee_invoices';
    protected $fillable = [
        'invoice_date',
        'student_id' ,
        'Grade_id' ,
        'Classroom_id',
        'fee_id',
        'amount',
        'description',
    ];
    
    function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
    function fees()
    {
        return $this->belongsTo(Fee::class,'fee_id','id');
    }
    function grade()
    {
        return $this->belongsTo(Grade::class,'Grade_id','id');
    }
    function classroom()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id','id');
    }
    function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }
}
