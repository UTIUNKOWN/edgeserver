<?php
use App\Http\Controllers\API\EdgeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('ketinggian',[EdgeController::class,'index']);
Route::get('ketinggian',[EdgeController::class,'sampah1']);
Route::get('ketinggian',[EdgeController::class,'sampah2']);
// Route::post('ketinggian',[EdgeController::class,'store']);
Route::post('ketinggian',[EdgeController::class,'test2']);
Route::get('ketinggian',[EdgeController::class,'test2']);
// Route::post('ketinggian',[EdgeController::class,'post']);
Route::get('test',[EdgeController::class,'test']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
