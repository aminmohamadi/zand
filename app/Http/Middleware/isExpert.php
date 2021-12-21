<?php


namespace App\Http\Middleware;


use Closure;
use Modules\AAA\Entities\Expert;

class isExpert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user =  auth()->guard(session('guard'))->user();
        if ($user && $user instanceof Expert){
            return $next($request);
        }
        else{
           return abort(403);
        }
    }
}
