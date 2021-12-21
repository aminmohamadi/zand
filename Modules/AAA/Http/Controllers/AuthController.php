<?php

namespace Modules\AAA\Http\Controllers;

use App\Helpers\Constants;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('aaa::login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()){
            toast($validator->errors()->first(),'error');
            return back();
        }

        if (substr($request->username,0,1) == 'e'){
            $guard = 'experts';
            $username = 'personality_id';
        }elseif (substr($request->username,0,1) == 's'){
            $guard = 'students';
            $username = 'student_id';
        }else
        {
            toast(Constants::INVALID_USERNAME_OR_PASSWORD,'error');
            return back();
        }
//        dd(auth()->guard($guard)->attempt([$username => substr($request->username,1,strlen($request->username )-1), 'password' => $request->password],$request->remember));

        if (auth()->guard($guard)->attempt([$username => substr($request->username,1,strlen($request->username )-1), 'password' => $request->password]))
        {
            $user = auth()->guard($guard)->user();
            $request->session()->put('guard', $guard);
            toast(Constants::WELCOME_MESSAGE,'success');
            return redirect()->route('dashboard');
        }else{
            toast(Constants::INVALID_USERNAME_OR_PASSWORD,'error');
            return back();
        }
    }

    public function logout(Request $request)
    {
        $guard = session('guard');
        auth()->guard($guard)->logout();
        session()->forget('guard');
        return redirect()->route('login');
    }
}
