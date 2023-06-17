<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'external_reference' => [
                'string',
                'required',
                'unique:transactions',
            ],
            'internal_reference' => [
                'string',
                'required',
                'unique:transactions',
            ],
            'requester' => [
                'string',
                'required',
            ],
            'voucher_code' => [
                'string',
                'required',
            ],
            'transaction_status' => [
                'required',
            ],
        ];
    }
}
