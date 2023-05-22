<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 'guardian_name', 'description_of_course', 'price', 'quantity', 'Total', 'payment_date', 'course_type', 'installment_number', 'created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
