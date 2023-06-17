<?php

namespace App\Http\Requests;

use App\Models\RedeemVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRedeemVoucherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('redeem_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:redeem_vouchers,id',
        ];
    }
}
