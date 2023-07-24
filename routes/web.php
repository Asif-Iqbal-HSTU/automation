<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

//Route::get('/dashboard/superAdmin',[\App\Http\Controllers\UserController::class,'gotoSuperAdminDashboard'])->name('superAdminDashboard');
Route::post('/loginUser',[\App\Http\Controllers\LoginController::class,'loginUser'])->name('loginUser');


Route::middleware(['user.auth'])->group(function(){

    Route::get('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logout');
    Route::get('/editPassword/{uid}', [\App\Http\Controllers\LoginController::class,'editPassword'])->name('editPassword');
    Route::put('/updatePassword/{uid}', [\App\Http\Controllers\LoginController::class,'updatePassword'])->name('updatePassword');
    //Route::get('/updatePasswordPage',[\App\Http\Controllers\LoginController::class,'gotoUpdatePassword'])->name('updatePasswordPage');
    //Route::put('/updatePassword', [\App\Http\Controllers\LoginController::class,'updatePassword'])->name('updatePassword');

    Route::middleware(['user.superAdmin:superAdmin'])->group(function () {
        Route::get('/addStudentPage',[\App\Http\Controllers\UserController::class,'addStudentPage'])->name('addStudentPage');
        Route::post('/addStudent',[\App\Http\Controllers\UserController::class,'addStudent'])->name('addStudent');
        Route::get('/addTeacherPage',[\App\Http\Controllers\UserController::class,'addTeacherPage'])->name('addTeacherPage');
        Route::post('/addTeacher',[\App\Http\Controllers\UserController::class,'addTeacher'])->name('addTeacher');

        Route::get('/searchUserPage', [\App\Http\Controllers\UserController::class,'gotoSearchUser'])->name('gotoSearchUser');
        Route::post('/searchUser',[\App\Http\Controllers\UserController::class,'searchUser'])->name('searchUser');

        Route::get('/editUser/{uid}', [\App\Http\Controllers\UserController::class,'editUser'])->name('editUser');
        Route::put('/updateUser/{uid}', [\App\Http\Controllers\UserController::class,'updateUser'])->name('updateUser');
    });


});


//Route::get('/addUserPage',[\App\Http\Controllers\UserController::class,'addUserPage'])->name('addUserPage');
//Route::get('/addStudentPage',[\App\Http\Controllers\UserController::class,'addStudentPage'])->name('addStudentPage');
//Route::post('/addStudent',[\App\Http\Controllers\UserController::class,'addStudent'])->name('addStudent');
//Route::get('/addTeacherPage',[\App\Http\Controllers\UserController::class,'addTeacherPage'])->name('addTeacherPage');
//Route::post('/addTeacher',[\App\Http\Controllers\UserController::class,'addTeacher'])->name('addTeacher');

//Route::get('/searchUserPage', [\App\Http\Controllers\UserController::class,'gotoSearchUser'])->name('gotoSearchUser');
//Route::post('/searchUser',[\App\Http\Controllers\UserController::class,'searchUser'])->name('searchUser');

//Route::get('/editUser/{uid}', [\App\Http\Controllers\UserController::class,'editUser'])->name('editUser');
//Route::put('/updateUser/{uid}', [\App\Http\Controllers\UserController::class,'updateUser'])->name('updateUser');


//Route::post('/demo',[\App\Http\Controllers\ModelController::class,'demo'])->name('demo');
//Route::get('/student/{uid}', [\App\Http\Controllers\ModelController::class,'show'])->name('student.show');

//Route::get('/student/{uid}/edit', 'StudentController@edit')->name('student.edit');
//Route::put('/student/{uid}', 'StudentController@update')->name('student.update');

Route::get('/searchPage', [\App\Http\Controllers\ModelController::class,'gotoSearch'])->name('gotoSearch');
//Route::post('/search',[\App\Http\Controllers\ModelController::class,'search'])->name('search');

//Route::get('/edit/{uid}', [\App\Http\Controllers\ModelController::class,'edit'])->name('edit');
//Route::put('/update/{uid}', [\App\Http\Controllers\ModelController::class,'update'])->name('update');


