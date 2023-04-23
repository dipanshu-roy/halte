<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

Route::prefix('ajax')->group(function () {
    Route::post('get-subcategory', [AjaxController::class, 'GetGubcategory']);
    // Route::post('users-status', [AjaxController::class, 'UsersStatus']);
    // Route::post('image-upload', [AjaxController::class, 'ImageUpload']);
    // Route::any('load-image', [AjaxController::class, 'LoadImage']);
    // Route::get('load-image-id/{id}', [AjaxController::class, 'LoadImageId']);
    // Route::post('delete-image', [AjaxController::class, 'DeleteImage']);
    // Route::post('check-email', [AjaxController::class, 'CheckEmail']);
    // Route::post('get-state', [AjaxController::class, 'GetState']);
    // Route::post('get-city', [AjaxController::class, 'GetCity']);
    // Route::get('notifications-count', [AjaxController::class, 'NotificationsCount']);
    // Route::get('notifications-history', [AjaxController::class, 'NotificationsHistory']);
    // Route::post('read-notification', [AjaxController::class, 'ReadNotification']);
    // Route::post('store-token', [AjaxController::class, 'StoreToken']);
    // Route::post('get-setting', [AjaxController::class, 'GetSetting']);
    // Route::get('qr-generate', [AjaxController::class, 'QrGenerate']);
    // Route::get('wallet', [AjaxController::class, 'Wallet']);
    // Route::get('send', [AjaxController::class, 'send']);
    // Route::post('delete-import-data', [AjaxController::class, 'DeleteImportData']);
});