<?php


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
        return view('welcome');
    });
    
    Route::get('/a', function () {
        return config('app.env');
    });

    Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
    Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee/store',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('/employee/show/{employee}',[EmployeeController::class,'show'])->name('employee.show');
    Route::get('/employee/edit/{employee}',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::put('employee/update/{employee}',[EmployeeController::class,'update'])->name('employee.update');
    Route::delete('/employee/{employee}',[EmployeeController::class,'destroy'])->name('employee.destroy');
    //Route::put('/employees/{employee}', 'EmployeeController@update')->name('employee.update');
   // Route::resource('employee',EmployeeController::class);
Auth::routes();

Auth::routes();

// normal user  route
Route::middleware(['auth','user-access:user'])->group(function(){

Route::get('/home', [HomeController::class, 'index'])->name('home');
});



//admin user
Route::middleware(['auth','user-access:admin'])->group(function(){
   
Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home');

});

//spervisor
Route::middleware(['auth','user-access:supervisor'])->group(function(){

    Route::get('/supervisor/home',[HomeController::class,'supervisorHome'])->name('supervisor.home');
    
 });

