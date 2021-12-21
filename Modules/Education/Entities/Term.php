<?php

namespace Modules\Education\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AAA\Entities\Student;

class Term extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'term_start',
        'term_end',
        'take_courses_start',
        'take_courses_end',
        'drop_take_courses_start',
        'drop_take_courses_end',
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class,'course_term','term_id','course_id');
    }

    public function termCourse()
    {
        return $this->belongsToMany(Course::class,'course_student_term','term_id','course_id');

    }
    public function student()
    {
        return $this->belongsToMany(Student::class,'course_student_term','course_id','student_id');
    }

    public function findCourse($id)
    {
        return $this->course->find($id);
    }

    public function scopeCurrentTerm()
    {
        $term_start = Carbon::parse($this->term_start);
        $term_end = Carbon::parse($this->term_end);
        if ($term_start->lt(Carbon::now()->toDate()) && $term_end->gt(Carbon::now()->toDate())) {
            return $this;
        }
    }

    public function scopeTermInTakeCourseTime()
    {
        $take_courses_start = Carbon::parse($this->currentTerm()->first()->take_courses_start);
        $take_courses_end = Carbon::parse($this->currentTerm()->first()->take_courses_end);
        return !!$take_courses_start->lt(Carbon::now()->toDate()) && $take_courses_end->gt(Carbon::now()->toDate());
    }
    public function scopeTermInDropTakeCourseTime()
    {
        $drop_take_courses_start = Carbon::parse($this->currentTerm()->first()->drop_take_courses_start);
        $drop_take_courses_end = Carbon::parse($this->currentTerm()->first()->drop_take_courses_end);
        return !!$drop_take_courses_start->lt(Carbon::now()->toDate()) && $drop_take_courses_end->gt(Carbon::now()->toDate());
    }
    public function scopeCurrentTermCourses()
    {
        return $this->currentTerm()->first()->course()->where('subject_code',\App\Helpers\Helper::user(session('guard'))->subject);
    }

}
