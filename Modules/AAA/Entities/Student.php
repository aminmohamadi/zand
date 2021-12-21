<?php

namespace Modules\AAA\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Education\Entities\Course;
use Modules\Education\Entities\Term;

class Student extends Model implements
    \Illuminate\Contracts\Auth\Authenticatable

{
    use HasFactory,Authenticatable, \Awobaz\Compoships\Compoships;
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'student_id',
        'address',
        'status',
        'gender',
        'subject',
        'password',
        'national_code'
    ];

    public function term()
    {
        return $this->belongsToMany(Term::class,'course_student_term','student_id','term_id');
    }

    public function course()
    {
        return $this->belongsToMany(Course::class,'course_student_term','student_id','term_id');
    }

    public function hasThisCourse($id)
    {
        return !!$this->belongsToMany(Course::class,'course_student_term','student_id','term_id')->whereCourseId($id)->get()->first(); //->withPivot('role_id')
    }

    public function CurrentTerm($id)
    {
        return $this->belongsToMany(Term::class,'course_student_term','student_id','term_id')->where('term_id',$id)->get();
    }
}
