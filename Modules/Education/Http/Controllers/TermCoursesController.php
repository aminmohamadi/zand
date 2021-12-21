<?php

namespace Modules\Education\Http\Controllers;

use App\Helpers\Constants;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Education\Entities\Course;
use Modules\Education\Entities\Term;

class TermCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = Course::all();
        return view('education::termcourses.index',compact('items'));
    }

    public function sync(Request $request,Term $term)
    {
        $term->course()->sync($request->course);
        toast(Constants::SUCCESSFUL_OPERATION, 'success');
        return back();
    }
}
