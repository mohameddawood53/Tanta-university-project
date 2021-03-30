<?php

namespace App\Http\Middleware;

use App\faculties as faculty;
use App\reservations;
use Closure;
use Illuminate\Support\Carbon;

class faculties
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
        $facultyNum = faculty::all()->count();
        $dates =  reservations::where("date" , ">=",Carbon::now()->toDateString())->get()->count();
//        dd($facultyNum);
        if ($facultyNum > 0 && $dates > 0)
        {
            return $next($request);

        }
        return response()->view("error.notavailable");
    }
}
