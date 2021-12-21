<?php

namespace Modules\Education\Http\Controllers;

use App\Helpers\Constants;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Education\Entities\Course;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('education::courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $action = route('course.store');
        $panelTitle = "ایجاد درس";
        $course = new Course();
        return view('education::courses.form',compact('course','action','panelTitle'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = $this->getCreateValidator($request->all());
        if ($validator->fails()){
            toast($validator->errors()->first(),'error');
            return back();
        }
        $course = Course::create([
            'course_code'=>$request->course_code,
            'subject_code'=>$request->subject_code,
            'course_title'=>$request->course_title,
            'professor'=>$request->professor,
            'day_of_week'=>$request->day_of_week,
            'hour'=>$request->hour,
            'credit'=>$request->credit
        ]);
        toast(Constants::SUCCESSFUL_OPERATION,'success');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('education::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Course $course
     * @return Renderable
     */
    public function edit(Course $course)
    {
        $action = route('course.update', $course->id);
        $panelTitle = "ویرایش درس";
        $method = 'PATCH';
        return view('education::courses.form', compact('panelTitle', 'course', 'action', 'method'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Course $course
     * @return Renderable
     */
    public function update(Request $request, Course $course)
    {
        $validator = $this->getUpdateValidator($request, $course);
        if ($validator->fails()){
            toast($validator->errors()->first(),'error');
            return back();
        }
        $course->update([
            'course_code'=>$request->course_code,
            'subject_code'=>$request->subject_code,
            'course_title'=>$request->course_title,
            'professor'=>$request->professor,
            'day_of_week'=>$request->day_of_week,
            'hour'=>$request->hour,
            'credit'=>$request->credit

        ]);
        toast(Constants::SUCCESSFUL_OPERATION,'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param  Course $course
     * @return Renderable
     */
    public function destroy(Course $course)
    {
        if ($course->delete()) {
            toast(Constants::SUCCESSFUL_OPERATION, 'success');
            return route('courses');
        } else {
            toast(Constants::ERROR_IN_OPERATION, 'error');
            return route('courses');
        }
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getCreateValidator($data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'course_code' => 'required|integer|unique:courses',
            'subject_code' => 'required|integer',
            'course_title' => 'required|min:4|max:50',
            'professor' => 'required|min:4|max:50',
            'day_of_week' => 'required|min:4|max:12',
            'hour' => 'required|integer|min:1|max:24',
        ]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getUpdateValidator(Request $request, Course $course): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'course_code' => 'required|integer|unique:courses,course_code,' . $course->id,
            'subject_code' => 'required|integer',
            'course_title' => 'required|min:4|max:50',
            'professor' => 'required|min:4|max:50',
            'day_of_week' => 'required|min:4|max:12',
            'hour' => 'required|integer|min:1|max:24',
        ]);
    }
}
