<?php

namespace App\Http\Requests;

use App\Models\IntegrationSystem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIntegrationSystemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('integration_system_create');
    }

    public function rules()
    {
        return [
            'system_name' => [
                'string',
                'required',
            ],
            'username' => [
                'string',
                'required',
                'unique:integration_systems',
            ],
            'password' => [
                'string',
                'required',
            ],
            'system_status' => [
                'required',
            ],
        ];
    }
}
