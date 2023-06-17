<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Voucher Category
    Route::delete('voucher-categories/destroy', 'VoucherCategoryController@massDestroy')->name('voucher-categories.massDestroy');
    Route::post('voucher-categories/media', 'VoucherCategoryController@storeMedia')->name('voucher-categories.storeMedia');
    Route::post('voucher-categories/ckmedia', 'VoucherCategoryController@storeCKEditorImages')->name('voucher-categories.storeCKEditorImages');
    Route::resource('voucher-categories', 'VoucherCategoryController');

    // Batches
    Route::delete('batches/destroy', 'BatchesController@massDestroy')->name('batches.massDestroy');
    Route::resource('batches', 'BatchesController');

    // Vouchers
    Route::delete('vouchers/destroy', 'VouchersController@massDestroy')->name('vouchers.massDestroy');
    Route::resource('vouchers', 'VouchersController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Integration System
    Route::delete('integration-systems/destroy', 'IntegrationSystemController@massDestroy')->name('integration-systems.massDestroy');
    Route::resource('integration-systems', 'IntegrationSystemController');

    // Redeem Voucher
    Route::delete('redeem-vouchers/destroy', 'RedeemVoucherController@massDestroy')->name('redeem-vouchers.massDestroy');
    Route::resource('redeem-vouchers', 'RedeemVoucherController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
