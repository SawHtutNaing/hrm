<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DivisionTypeController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\EmploymentTypeController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PayscaleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('index');
// });


Route::get('/my', function () {
    return redirect('index');
});



$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }

        // Custom page demo for 500 server error
        if (Str::contains($val['path'], 'error-500')) {
            Route::get($val['path'], function () {
                abort(500, 'Something went wrong! Please try again later.');
            });
        }
    }
});
Route::resource('divisions' , DivisionController::class);
Route::resource('division_types', DivisionTypeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('payscales', PayscaleController::class);
Route::resource('employment_types', EmploymentTypeController::class);
Route::resource('staffs', StaffController::class);
Route::post('staff/{id}/restore', [StaffController::class, 'restore'])->name('staff.restore');
Route::get('/get-cities/{country_id}', [CityController::class, 'getCitiesByCountry']);


Route::resource('leave_types', LeaveTypeController::class);




// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
    Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
});

// Route::middleware('auth')->group(function () {
//     // Account pages
//     // Route::prefix('account')->group(function () {
//     //     Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
//     //     Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
//     //     Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
//     //     Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
//     // });

//     // Logs pages
//     // Route::prefix('log')->name('log.')->group(function () {
//     //     Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
//     //     Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
//     // });
// });

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
