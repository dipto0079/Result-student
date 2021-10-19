<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_marks',
        'subject_id',
        'student_id',

    ];

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
