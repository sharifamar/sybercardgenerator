<?php

namespace App\Http\Requests;

use App\Models\Batch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('batch_edit');
    }

    public function rules()
    {
        return [
            'batch_serial_number' => [
                'string',
                'required',
            ],
            'expiry_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'voucher_id' => [
                'required',
                'integer',
            ],
            'number_of_vouchers' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'generated' => [
                'required',
            ],
        ];
    }
}
