<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FormController;
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

Route::get('/login',[AuthController::class, 'index'])->name('auth.index')->middleware('guest');
Route::post('/login',[AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware' => 'auth:user'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile',[DashboardController::class, 'profile'])->name('dashboard.profile');

        Route::prefix('task')->group(function () {
            Route::get('/', [TaskController::class, 'index'])->name('task');
            Route::get('create', [TaskController::class, 'create'])->name('task.create');
            Route::post('store', [TaskController::class, 'store'])->name('task.store');
            Route::any('list', [TaskController::class, 'list'])->name('task.list');
            Route::get('edit/{id}',[TaskController::class, 'edit'])->name('task.edit');
            Route::post('update/{id}', [TaskController::class, 'update'])->name('task.update');
            Route::get('delete/{id}',[TaskController::class, 'delete'])->name('task.delete');
      
        });

        Route::prefix('form')->group(function () {
            Route::get('/', [FormController::class, 'index'])->name('form');
            Route::get('create', [FormController::class, 'create'])->name('form.create');
            Route::post('store', [FormController::class, 'store'])->name('form.store');
            Route::any('list', [FormController::class, 'list'])->name('form.list');
            Route::get('edit/{id}',[FormController::class, 'edit'])->name('form.edit');
            Route::post('update/{id}', [FormController::class, 'update'])->name('form.update');
            Route::get('delete/{id}',[FormController::class, 'delete'])->name('form.delete');
      
        });

    });
    Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('files/{filename}', function ($filename){
    $path = storage_path('app/public/'.$filename);
    if(!File::exists($path)){
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;

})->name('storage');

