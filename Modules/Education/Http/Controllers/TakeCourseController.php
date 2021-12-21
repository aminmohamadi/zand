<?php

namespace Modules\Education\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\Helper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Education\Entities\Course;
use Modules\Education\Entities\Term;

class TakeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $current_term = Term::currentTerm()->get()->first();
        $courses = Term::currentTermCourses()->get();
        $term_in_take_course_time = Term::termInTakeCourseTime();
        $token_courses = Helper::user(session('guard'))->CurrentTerm($current_term->id)->first()->termCourse;
        return view('education::dashboard.take_course', compact('current_term', 'courses', 'term_in_take_course_time','token_courses'));
    }

    public function sync(Request $request, Term $term)
    {
        $student = Helper::user(session('guard'));
        $credit_total = 0;
        $collection = collect();
        foreach ($request->course_id as $item) {
            $course = Course::whereId($item)->first();
            $credit_total = $credit_total + $course->credit;
            $collection->push($course);
        }
        for ($i = 0; $i<$collection->count();$i++){
         if ($i>0){
             if ($collection[$i]->day_of_week == $collection[$i-1]->day_of_week && $collection[$i]->hour == $collection[$i-1]->hour){
                 toast(Constants::CLASS_TIME_CONFLICT,'error');
                 return back();
             }
         }
        }
        if ($credit_total > 16){
            toast(Constants::OUT_OF_RANG_CREDITS,'error');
            return back();
        }
        $student->term()->detach([$term->id]);
        foreach ($request->course_id as $item) {
            $student->term()->attach([$term->id => ['course_id' => $item]]);
        }
        toast(Constants::SUCCESSFUL_OPERATION,'success');
        return back();
    }


    public function tokenCourses()
    {
        $userTerms =Helper::user(session('guard'))->term()->groupBy('term_id')->get();
        return view('education::dashboard.token-courses', compact('userTerms'));

    }

}
