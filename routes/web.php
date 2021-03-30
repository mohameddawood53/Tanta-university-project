<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', 'studentData');
Route::get("/verify",function ()
{
    return view('student.verify');
});
Route::put("/verify","studentData@verify");
//Route::get("/verified",function ()
//{
//    return view('student.verified');
//});

Route::group(['middleware' => "authAdmin:admin"] , function()
{
    Route::get("/dashboard",function ()
    {
        return "Dash";
    });
    Route::get('/students',"studentData@view");
    Route::delete("/{id}","studentData@destroy");
    Route::get("/{id}/edit","studentData@edit");
    Route::put("{id}","studentData@update");

    Route::get("/admin/logout","adminController@logout");

});

Route::get("/admin/login","adminController@login_get");
Route::post("/admin/login","adminController@login_post");
Route::resource("/faculties","facultyController");
Route::resource("/reservations","reservationsController");



