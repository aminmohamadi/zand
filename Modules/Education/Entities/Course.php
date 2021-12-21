<?php

namespace Modules\Education\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AAA\Entities\Student;

class Course extends Model
{
    use HasFactory, \Awobaz\Compoships\Compoships;
    public $timestamps = false;
    protected $fillable = [
        'course_code',
        'subject_code',
        'course_title',
        'professor',
        'day_of_week',
        'hour',
        'credit'
    ];

    public function term()
    {
        return $this->belongsToMany(Term::class,'course_term','course_id','term_id'); //->withPivot('role_id')
    }
    public function termCourse()
    {
        return $this->belongsToMany(Term::class,'course_student_term','course_id','term_id'); //->withPivot('role_id')
    }
    public function student()
    {
        return $this->belongsToMany(Student::class,'course_student_term','course_id','student_id'); //->withPivot('role_id')
    }

}
