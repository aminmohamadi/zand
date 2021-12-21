<?php

namespace Modules\Education\Http\Controllers;

use App\Helpers\Constants;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Modules\Education\Entities\Term;
use Modules\Education\Rules\GreaterThan;
use Modules\Education\Rules\LessThan;
use RealRashid\SweetAlert\Facades\Alert;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $terms = Term::all();
        return view('education::terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $action = route('term.store');
        $panelTitle = "ایجاد ترم";
        $term = new Term();
        return view('education::terms.form', compact('panelTitle', 'term', 'action'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $term_start = Carbon::parse($request->term_start);
        $term_end = Carbon::parse($request->term_end);
        $take_courses_start = Carbon::parse($request->take_courses_start);
        $take_courses_end = Carbon::parse($request->take_courses_end);
        $drop_take_courses_start = Carbon::parse($request->drop_take_courses_start);
        $drop_take_courses_end = Carbon::parse($request->drop_take_courses_end);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'term_start' => 'required|date',
            'term_end' => ['required','date',new LessThan('آغاز ترم','پایان ترم',$term_start)],
            'take_courses_start' => ['required','date',new GreaterThan('پایان  ترم','شروع انتخاب واحد',$term_end),new LessThan('آغاز ترم','شروع انتخاب واحد',$term_start)],
            'take_courses_end' => ['required','date',new GreaterThan('پایان  ترم','پایان انتخاب واحد',$term_end),new LessThan('شروع انتخاب واحد','پایان انتخاب واحد',$take_courses_start)],
            'drop_take_courses_start' => ['required','date',new GreaterThan('پایان  ترم','شروع حذف و اضافه',$term_end),new LessThan('پایان انتخاب واحد','شروع حذف و اضافه',$take_courses_end)],
            'drop_take_courses_end' => ['required','date',new GreaterThan('پایان  ترم','پایان حذف و اضافه',$term_end),new LessThan('شروع حذف و اضافه','پایان حذف و اضافه',$drop_take_courses_start)],
        ]);
        if ($validator->fails()) {
            toast($validator->errors()->first(), 'error');
            return back();
        }
        $term = Term::create([
            'title' => $request->title,
            'term_start' => $term_start->toDate(),
            'term_end' => $term_end->toDate(),
            'take_courses_start' => $take_courses_start->toDate(),
            'take_courses_end' => $take_courses_end->toDate(),
            'drop_take_courses_start' => $drop_take_courses_start->toDate(),
            'drop_take_courses_end' => $drop_take_courses_end->toDate(),
        ]);

        toast(Constants::SUCCESSFUL_OPERATION, 'success');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Term $term)
    {
        $action = route('term.update', $term->id);
        $panelTitle = "ویرایش ترم";
        $method = 'PATCH';
        return view('education::terms.form', compact('panelTitle', 'term', 'action', 'method'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Term $term, Request $request)
    {
        $term_start = Carbon::parse($request->term_start);
        $term_end = Carbon::parse($request->term_end);
        $take_courses_start = Carbon::parse($request->take_courses_start);
        $take_courses_end = Carbon::parse($request->take_courses_end);
        $drop_take_courses_start = Carbon::parse($request->drop_take_courses_start);
        $drop_take_courses_end = Carbon::parse($request->drop_take_courses_end);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'term_start' => 'required|date',
            'term_end' => ['required','date',new LessThan('آغاز ترم','پایان ترم',$term_start)],
            'take_courses_start' => ['required','date',new GreaterThan('پایان  ترم','شروع انتخاب واحد',$term_end),new LessThan('آغاز ترم','شروع انتخاب واحد',$term_start)],
            'take_courses_end' => ['required','date',new GreaterThan('پایان  ترم','پایان انتخاب واحد',$term_end),new LessThan('شروع انتخاب واحد','پایان انتخاب واحد',$take_courses_start)],
            'drop_take_courses_start' => ['required','date',new GreaterThan('پایان  ترم','شروع حذف و اضافه',$term_end),new LessThan('پایان انتخاب واحد','شروع حذف و اضافه',$take_courses_end)],
            'drop_take_courses_end' => ['required','date',new GreaterThan('پایان  ترم','پایان حذف و اضافه',$term_end),new LessThan('شروع حذف و اضافه','پایان حذف و اضافه',$drop_take_courses_start)],
        ]);
        if ($validator->fails()) {
            toast($validator->errors()->first(), 'error');
            return back();
        }
        $term = $term->update([
            'title' => $request->title,
            'term_start' => $term_start->toDate(),
            'term_end' => $term_end->toDate(),
            'take_courses_start' => $take_courses_start->toDate(),
            'take_courses_end' => $take_courses_end->toDate(),
            'drop_take_courses_start' => $drop_take_courses_start->toDate(),
            'drop_take_courses_end' => $drop_take_courses_end->toDate(),
        ]);

        toast(Constants::SUCCESSFUL_OPERATION, 'success');
        return redirect()->route('terms');
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Term $term)
    {
        if ($term->delete()) {
            toast(Constants::SUCCESSFUL_OPERATION, 'success');
            return route('terms');
        } else {
            toast(Constants::ERROR_IN_OPERATION, 'error');
            return route('terms');
        }
    }
}
