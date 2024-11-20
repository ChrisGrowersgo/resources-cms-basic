<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\CityController;

use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
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



Route::middleware(['auth:api'])->group(function () {

    Route::get('categories', [CategoryController::class, 'index']); // Obtener todas las categorías
    Route::get('categories/{category}', [CategoryController::class, 'show']); // Obtener una categoría específica
    Route::post('categories', [CategoryController::class, 'store']); // Crear nueva categoría
    Route::put('categories/{category}', [CategoryController::class, 'update']); // Editar categoría
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']); // Eliminar categoría


    Route::get('/subcategories', [SubCategoryController::class, 'index']);
    Route::get('/subcategories/{id}', [SubCategoryController::class, 'show']);
    Route::post('/subcategories', [SubCategoryController::class, 'store']);
    Route::put('/subcategories/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/subcategories/{id}', [SubCategoryController::class, 'destroy']);

    Route::get('resources', [ResourceController::class, 'index']);
    Route::post('resources', [ResourceController::class, 'store']);
    Route::get('resources/{resource}', [ResourceController::class, 'show']);
    Route::put('resources/{resource}', [ResourceController::class, 'update']);
    Route::delete('resources/{resource}', [ResourceController::class, 'destroy']);

    Route::get('cities', [CityController::class, 'index']);
    Route::post('cities', [CityController::class, 'store']);
    Route::get('cities/{city}', [CityController::class, 'show']);
    Route::put('cities/{city}', [CityController::class, 'update']);
    Route::delete('cities/{city}', [CityController::class, 'destroy']);
    
});

Route::get('/mi/categories',function(){
    $categories = Category::all();
    return response()->json($categories);
});
