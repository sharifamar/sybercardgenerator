<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'voucher_category_create',
            ],
            [
                'id'    => 18,
                'title' => 'voucher_category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'voucher_category_show',
            ],
            [
                'id'    => 20,
                'title' => 'voucher_category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'voucher_category_access',
            ],
            [
                'id'    => 22,
                'title' => 'batch_create',
            ],
            [
                'id'    => 23,
                'title' => 'batch_edit',
            ],
            [
                'id'    => 24,
                'title' => 'batch_show',
            ],
            [
                'id'    => 25,
                'title' => 'batch_delete',
            ],
            [
                'id'    => 26,
                'title' => 'batch_access',
            ],
            [
                'id'    => 27,
                'title' => 'voucher_create',
            ],
            [
                'id'    => 28,
                'title' => 'voucher_edit',
            ],
            [
                'id'    => 29,
                'title' => 'voucher_show',
            ],
            [
                'id'    => 30,
                'title' => 'voucher_delete',
            ],
            [
                'id'    => 31,
                'title' => 'voucher_access',
            ],
            [
                'id'    => 32,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 33,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 34,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 35,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 36,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 37,
                'title' => 'integration_system_create',
            ],
            [
                'id'    => 38,
                'title' => 'integration_system_edit',
            ],
            [
                'id'    => 39,
                'title' => 'integration_system_show',
            ],
            [
                'id'    => 40,
                'title' => 'integration_system_delete',
            ],
            [
                'id'    => 41,
                'title' => 'integration_system_access',
            ],
            [
                'id'    => 42,
                'title' => 'redeem_voucher_create',
            ],
            [
                'id'    => 43,
                'title' => 'redeem_voucher_edit',
            ],
            [
                'id'    => 44,
                'title' => 'redeem_voucher_show',
            ],
            [
                'id'    => 45,
                'title' => 'redeem_voucher_delete',
            ],
            [
                'id'    => 46,
                'title' => 'redeem_voucher_access',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
