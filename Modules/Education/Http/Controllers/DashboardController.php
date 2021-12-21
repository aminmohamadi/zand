<?php


namespace Modules\Education\Http\Controllers;


use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\AAA\Entities\Expert;
use Modules\Education\Entities\Term;

class DashboardController
{
    public function index()
    {
        $user = Helper::user(session('guard'));
        if ($user instanceof Expert){
            return view('education::dashboard.index');

        }
        $current_term = Term::currentTerm()->get()->first();
        $courses = Term::currentTermCourses()->get();
        $term_in_take_course_time = Term::termInTakeCourseTime();
        $token_courses = $user->CurrentTerm($current_term->id)->first()->termCourse;
        if ($term_in_take_course_time && $token_courses->count() === 0) {
            return redirect()->route('take-course');
        }
        return view('education::dashboard.index', compact('current_term', 'token_courses', 'courses'));
    }
}
