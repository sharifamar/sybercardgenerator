<?php

namespace App\Http\Requests;

use App\Models\RedeemVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRedeemVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('redeem_voucher_create');
    }

    public function rules()
    {
        return [
            'voucher_code' => [
                'string',
                'required',
            ],
            'requester' => [
                'string',
                'required',
            ],
            'external_reference' => [
                'string',
                'required',
                'unique:redeem_vouchers',
            ],
        ];
    }
}
