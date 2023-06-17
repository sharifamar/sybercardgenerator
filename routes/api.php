<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Transactions
    Route::apiResource('transactions', 'TransactionsApiController');

    // Redeem Voucher
    Route::apiResource('redeem-vouchers', 'RedeemVoucherApiController');
});
