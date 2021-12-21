<?php


namespace App\Helpers;


class Helper
{
    public static function user($guard){
        $user =  auth()->guard($guard)->user();
        if ($user)return $user;
        else
            return redirect()->route('login');
    }

}
