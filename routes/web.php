<?php

use App\Exports\ExportRole;
use App\Exports\ExportUser;
use App\Imports\ImportRoler;
use App\Imports\ImportRoleWithUsers;
use App\Imports\ImportUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------- -------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users = User::simplePaginate(10);
    return view('users')
            ->with('users',$users);
})->name('users');

Route::get('/roles', function () {

    $roles = Role::simplePaginate(10);
    return view('roles')
            ->with('roles',$roles);
})->name('roles');


/**ExporT */
Route::get('user/export',function(){
    return Excel::download(new ExportUser, 'users.xlsx');
})->name('user-export');

Route::get('role/export',function(){
    return Excel::download(new ExportRole, 'roles.xlsx');
})->name('role-export');

/**Import */
Route::post('user/import',function(Request $request){
    Excel::import(new ImportUser, $request->file('file')->store('temp'));
    return back();
})->name('user-import');


Route::post('role/import',function(Request $request){
    Excel::import(new ImportRoler, $request->file('file')->store('temp'));
    return back();
})->name('role-import');


Route::post('import-role-with-users',function(Request $request){
    Excel::import(new ImportRoleWithUsers, $request->file('file')->store('temp'));
    return back();
})->name('import-role-with-users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
