<?php

namespace App\Http\Requests;

use App\Models\Voucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_create');
    }

    public function rules()
    {
        return [
            'voucher_code' => [
                'string',
                'min:10',
                'required',
            ],
            'voucher_status' => [
                'required',
            ],
            'batch_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'used_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'expired_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'used_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
