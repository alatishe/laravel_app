<?php

use App\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Http\Controllers\Backend\Auth\User\UserConfirmationController;
use App\Http\Controllers\Backend\Auth\User\UserController;
use App\Http\Controllers\Backend\Auth\User\CarrierController;
use App\Http\Controllers\Backend\Carriers\ShippingCarriersController;
use App\Http\Controllers\Backend\Carriers\ShippingCarriersTableController;
use App\Http\Controllers\Backend\Auth\User\UserPasswordController;
use App\Http\Controllers\Backend\Auth\User\UserSessionController;
use App\Http\Controllers\Backend\Auth\User\UserSocialController;
use App\Http\Controllers\Backend\Auth\User\UserStatusController;

Route::get('shipping-rates', [CarrierController::class, 'index'])->name('carrier.index');
Route::post('shipping-rates', [CarrierController::class, 'upload'])->name('carrier.upload');
Route::get('shipping-rates-list', [CarrierController::class, 'listnew'])->name('carrier.list1');
Route::post('shipping-rates-list', [CarrierController::class, 'list'])->name('carrier.list');

Route::group(['namespace' => 'Carriers'], function () {
    Route::resource('carriers', 'ShippingCarriersController', ['except' => ['show']]);
    //For DataTables
    Route::post('carriers/get', 'ShippingCarriersTableController')->name('carriers.get');
});


// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'namespace' => 'Auth',
    'middleware' => 'access.routeNeedsPermission:view-access-management',
], function () {
    // User Management

    
    /*Route::get('carriers/create', [CarriersController::class, 'create'])->name('carriers.create');
    Route::post('carriers/create', [CarriersController::class, 'store'])->name('carriers.store');
    Route::get('carriers/{carriers}', [CarriersController::class, 'edit'])->name('carriers.edit');
    Route::post('carriers/{carriers}', [CarriersController::class, 'update'])->name('carriers.update');*/
    

    Route::group(['namespace' => 'User'], function () {
        // For DataTables
        Route::post('user/get', 'UserTableController')->name('user.get');

        // User Status'
        Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
        Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');

        // User CRUD
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');

        // Specific User
        Route::group(['prefix' => 'user/{user}'], function () {
            // User
            Route::get('/', [UserController::class, 'show'])->name('user.show');
            Route::get('edit', [UserController::class, 'edit'])->name('user.edit');
            Route::patch('/', [UserController::class, 'update'])->name('user.update');
            Route::delete('/', [UserController::class, 'destroy'])->name('user.destroy');

            // Account
            Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);

            // Social
            Route::delete('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');

            // Confirmation
            Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
            Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');

            // Password
            Route::get('password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
            Route::patch('password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');

            // log in as
            Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');

            // Session
            Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');

            // Deleted
            Route::delete('delete-permanently', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
            Route::post('restore', [UserStatusController::class, 'restore'])->name('user.restore');
        });
    });

    // Role Management
    Route::group(['namespace' => 'Role'], function () {
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role/{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('role.destroy');
        });

        // For DataTables
        Route::post('role/get', 'RoleTableController')->name('role.get');
    });

    // Permission Management
    Route::group(['namespace' => 'Permission'], function () {
        Route::resource('permission', 'PermissionsController', ['except' => ['show']]);

        //For DataTables
        Route::post('permission/get', 'PermissionTableController')->name('permission.get');
    });
});
