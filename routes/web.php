<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\BeautyController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
//use App\Http\Controllers\MainController;
use App\Models\Beauty;

//Route::get('/', function () {
 //  return view('home');
//});

//Route::get('/', [HomeController::class, 'index'])->name('home' );

//Route::get("/", function () {
 //   dd("Route hoạt động!");
//});
//Route::get('/', function () {
 //   return 'Route đã được xử lý!';
//});

//Route::get("/clients/home", [HomeController::class,"index"])->name('home' );
Route::get("/admin/users/login", [LoginController::class,"index"])->name('login');
Route::post("/admin/users/login/store", [LoginController::class,"store"]);



Route::middleware(['auth'])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('/main',[MainController::class, 'index']);

        #Menu
        Route::prefix('/menus')->group(function () {
            Route::get('/add', [MenuController::class,'create']);
            Route::post('/add', [MenuController::class,'store']);
            Route::get('/list', [MenuController::class,'index']);
            Route::get('/edit/{menu}', [MenuController::class,'show']);
            Route::post('/edit/{menu}', [MenuController::class,'update']);
            Route::delete('/destroy', [MenuController::class,'destroy']);
        });

        #Beauty
        Route::prefix('/beauties')->group(function(){
            Route::get('/add', [BeautyController::class, 'create']);
            Route::post('/add', [BeautyController::class, 'store']);
            Route::get('/list', [BeautyController::class, 'index']);
            Route::get('/edit/{beauty}', [BeautyController::class, 'show']);
            Route::post('/edit/{beauty}', [BeautyController::class, 'update']);
            Route::DELETE('/destroy', [BeautyController::class, 'destroy']);
        });

        #Slider
        Route::prefix('/sliders')->group(function () {
            Route::get('/add', [SliderController::class, 'create']);
            Route::post('/add', [SliderController::class, 'store']);
            Route::get('/list', [SliderController::class, 'index']);
            Route::get('/edit/{slider}', [SliderController::class, 'show']);
            Route::post('/edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('/destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
    
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-beauty', [App\Http\Controllers\MainController::class, 'loadBeauty']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
//Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\BeautyController::class, 'index']);