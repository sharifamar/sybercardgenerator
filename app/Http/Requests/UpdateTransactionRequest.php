<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_edit');
    }

    public function rules()
    {
        return [
            'external_reference' => [
                'string',
                'required',
                'unique:transactions,external_reference,' . request()->route('transaction')->id,
            ],
            'internal_reference' => [
                'string',
                'required',
                'unique:transactions,internal_reference,' . request()->route('transaction')->id,
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
