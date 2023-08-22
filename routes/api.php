<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\QuizAnswerController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TipsCategoryController;
use App\Http\Controllers\TipsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/me', [AuthController::class, 'me'])->middleware('auth:jwt');


Route::prefix("doctors")->group(function () {
    Route::get("/", [DoctorsController::class, "index"]);
    Route::get("/{id}", [DoctorsController::class, "show"]);
    Route::post("/", [DoctorsController::class, "store"]);
    Route::post("/{id}", [DoctorsController::class, "update"]);
    Route::delete("/{id}", [DoctorsController::class, "destroy"]);
})->middleware('auth:jwt');


Route::prefix("articles")->group(function () {
    Route::get("/", [ArticlesController::class, "index"]);
    Route::get("/{id}", [ArticlesController::class, "show"]);
    Route::post("/", [ArticlesController::class, "store"]);
    Route::post("/{id}", [ArticlesController::class, "update"]);
    Route::delete("/{id}", [ArticlesController::class, "destroy"]);
})->middleware('auth:jwt');

Route::prefix("tips")->group(function () {
    Route::get("/", [TipsController::class, "index"]);
    Route::get("/{id}", [TipsController::class, "show"]);
    Route::post("/", [TipsController::class, "store"]);
    Route::post("/{id}", [TipsController::class, "update"]);
    Route::delete("/{id}", [TipsController::class, "destroy"]);
})->middleware('auth:jwt');

Route::prefix("tips-category")->group(function () {
    Route::get("/", [TipsCategoryController::class, "index"]);
    Route::get("/{id}", [TipsCategoryController::class, "show"]);
    Route::post("/", [TipsCategoryController::class, "store"]);
    Route::post("/{id}", [TipsCategoryController::class, "update"]);
    Route::delete("/{id}", [TipsCategoryController::class, "destroy"]);
})->middleware('auth:jwt');

Route::prefix("category")->group(function () {
    Route::get("/", [CategoryController::class, "index"]);
    Route::get("/{id}", [CategoryController::class, "show"]);
    Route::post("/", [CategoryController::class, "store"]);
    Route::post("/{id}", [CategoryController::class, "update"]);
    Route::delete("/{id}", [CategoryController ::class, "destroy"]);
})->middleware('auth:jwt');

Route::prefix("promo")->group(function () {
    Route::get("/", [PromoController::class, "index"]);
    Route::get("/{id}", [PromoController::class, "show"]);
    Route::post("/", [PromoController::class, "store"]);
    Route::post("/{id}", [PromoController::class, "update"]);
    Route::delete("/{id}", [PromoController::class, "destroy"]);
})->middleware('auth:jwt');


Route::prefix("quiz-answer")->group(function () {
    Route::get("/", [QuizAnswerController::class, "index"]);
    Route::get("/{id}", [QuizAnswerController::class, "show"]);
    Route::post("/", [QuizAnswerController::class, "store"]);
    Route::post("/{id}", [QuizAnswerController::class, "update"]);
    Route::delete("/{id}", [QuizAnswerController::class, "destroy"]);
})->middleware('auth:jwt');

Route::prefix("quiz")->group(function () {
    Route::get("/", [QuizController::class, "index"]);
    Route::get("/{id}", [QuizController::class, "show"]);
    Route::post("/", [QuizController::class, "store"]);
    Route::post("/{id}", [QuizController::class, "update"]);
    Route::delete("/{id}", [QuizController::class, "destroy"]);
})->middleware('auth:jwt');
