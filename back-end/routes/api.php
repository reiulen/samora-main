<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiCareerController;
use App\Http\Controllers\Api\ApiLeaderController;
use App\Http\Controllers\Api\ApiCorporateDocument;
use App\Http\Controllers\Api\ApiGalleryController;
use App\Http\Controllers\Api\ApiHeadlineController;
use App\Http\Controllers\Api\ApiQuickLinkController;
use App\Http\Controllers\Api\ApiKnowledgeBaseController;
use App\Http\Controllers\Api\ApiCorporateCommunicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// news
Route::get('news', [ApiNewsController::class, 'index']);
Route::get('news/{slug}', [ApiNewsController::class, 'detail']);

// career
Route::get('career', [ApiCareerController::class, 'index']);

// event
Route::get('event', [ApiEventController::class, 'index']);

// corporate document
Route::get('corporate-document', [ApiCorporateDocument::class, 'index']);

// corporate communication
Route::get('corporate-communication', [ApiCorporateCommunicationController::class, 'index']);

// knowledge base
Route::get('knowledge-base', [ApiKnowledgeBaseController::class, 'index']);

// quick link
Route::get('quick-link', [ApiQuickLinkController::class, 'index']);

// headline
Route::get('headline', [ApiHeadlineController::class, 'index']);

// gallery
Route::get('gallery', [ApiGalleryController::class, 'index']);

// leader
Route::get('leader', [ApiLeaderController::class, 'index']);

// user
Route::get('users', [ApiUserController::class, 'index']);
