<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\CorporateDocumentController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\CorporateCommunicationController;
use App\Http\Controllers\UserController;



Route::get('auth', [AuthController::class, 'index'])->name('login');
Route::post('auth', [AuthController::class, 'post'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.index');
    })->name('index');

    Route::prefix('dashboard')->group(function () {

        Route::resource('headline', HeadlineController::class);
        Route::post('headline/update-item-active/{id}', [HeadlineController::class, 'updateItemActive'])->name('headline.updateItemActive');

        Route::resource('event', EventController::class);
        Route::resource('career', CareerController::class);
        Route::post('career/update-item-active/{id}', [CareerController::class, 'updateItemActive'])->name('career.updateItemActive');
        Route::resource('leader', LeaderController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('corporate-communication', CorporateCommunicationController::class);
        Route::resource('corporate-document', CorporateDocumentController::class);
        Route::resource('news', NewsController::class);
        Route::post('career/update-item-published/{id}', [NewsController::class, 'updateItemPublished'])->name('news.updateItemPublished');
        Route::resource('knowledge-base', KnowledgeBaseController::class);
        Route::resource('quick-link', QuickLinkController::class);
        Route::post('quick-link/update-target-active/{id}', [QuickLinkController::class, 'updateTargetActive'])->name('quick-link.updateTargetActive');
        Route::resource('users', UserController::class);
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
