<?php

namespace Modules\Users\Http\Controllers;

use App\Helpers\Constants;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\AAA\Entities\Student;
use RealRashid\SweetAlert\Facades\Alert;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $students = Student::all();

        /*دکمه ctrl + k رو که بزنید کامیت میشه*/

        return view('users::students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $action = route('student.store');
        $panelTitle = "ایجاد دانشجو";
        $student = new Student();
        return view('users::students.form', compact('panelTitle', 'student', 'action'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = $this->getCreateValidator($request);
        if ($validator->fails()) {
            toast($validator->errors()->first(),'error');
            return redirect()->route('students');
        }
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
            'student_id' => $request->student_id,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'gender' => $request->gender,
            'status' => $request->status,
            'address' => $request->address,
            'password' => Hash::make(strval($request->national_code)),
        ]);
        toast(Constants::SUCCESSFUL_OPERATION, 'success');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     * @param Student $student
     * @return Renderable
     */
    public function edit(Student $student)
    {
        $action = route('student.update',$student->id);
        $panelTitle = "ویرایش دانشجو";
        $method = 'PATCH';
        return view('users::students.form', compact('panelTitle', 'student', 'action','method'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Student $student
     * @return Renderable
     */
    public function update(Student $student,Request $request)
    {
        $validator = $this->getUpdateValidator($request, $student);
        if ($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return back();
        }
        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
            'student_id' => $request->student_id,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'gender' => $request->gender,
            'status' => $request->status,
            'address' => $request->address,

        ]);
        toast(Constants::SUCCESSFUL_OPERATION, 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Student $student)
    {
        if ($student->delete()){
            toast(Constants::SUCCESSFUL_OPERATION, 'success');
            return route('students');
        }else{
            toast(Constants::ERROR_IN_OPERATION, 'error');
            return route('students');
        }



    }

    /**
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getUpdateValidator(Request $request, Student $student): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'status' => 'required',
            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:students,phone,' . $student->id,
            'gender' => 'required',
            'national_code' => 'required|integer|digits:10|unique:students,national_code,' . $student->id,
            'student_id' => 'required|integer|digits:10|unique:students,student_id,' . $student->id,
            'subject' => 'required|integer',
            'address' => 'required'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getCreateValidator(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'national_code' => 'required|integer|digits:10|unique:students',
            'student_id' => 'required|integer|digits:10|unique:students',
            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:students',
            'subject' => 'required|integer',
            'gender' => 'required',
            'status' => 'required',
            'address' => 'required'
        ]);
    }
}
