<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'voucherCategory' => [
        'title'          => 'Voucher Category',
        'title_singular' => 'Voucher Category',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'voucher_name'         => 'Voucher Name',
            'voucher_name_helper'  => ' ',
            'amount'               => 'Amount',
            'amount_helper'        => ' ',
            'currency'             => 'Currency',
            'currency_helper'      => ' ',
            'voucher_image'        => 'Voucher Image',
            'voucher_image_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'batch' => [
        'title'          => 'Batches',
        'title_singular' => 'Batch',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'batch_serial_number'        => 'Batch Serial Number',
            'batch_serial_number_helper' => ' ',
            'expiry_date'                => 'Expiry Date',
            'expiry_date_helper'         => ' ',
            'voucher'                    => 'Voucher Name',
            'voucher_helper'             => ' ',
            'number_of_vouchers'         => 'Number Of Vouchers',
            'number_of_vouchers_helper'  => ' ',
            'voucher_status'             => 'Voucher Status',
            'voucher_status_helper'      => ' ',
            'generated'                  => 'Generated',
            'generated_helper'           => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'voucher' => [
        'title'          => 'Vouchers',
        'title_singular' => 'Voucher',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'voucher_code'          => 'Voucher Code',
            'voucher_code_helper'   => ' ',
            'voucher_status'        => 'Voucher Status',
            'voucher_status_helper' => ' ',
            'batch'                 => 'Batch',
            'batch_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'category'              => 'Category',
            'category_helper'       => ' ',
            'used_at'               => 'Used At',
            'used_at_helper'        => ' ',
            'expired_at'            => 'Expired At',
            'expired_at_helper'     => ' ',
            'used_by'               => 'Used By',
            'used_by_helper'        => ' ',
        ],
    ],
    'transaction' => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'external_reference'        => 'External Reference',
            'external_reference_helper' => ' ',
            'internal_reference'        => 'Internal Reference',
            'internal_reference_helper' => ' ',
            'requester'                 => 'Requester',
            'requester_helper'          => ' ',
            'voucher_code'              => 'Voucher Code',
            'voucher_code_helper'       => ' ',
            'transaction_status'        => 'Transaction Status',
            'transaction_status_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'integrationSystem' => [
        'title'          => 'Integration System',
        'title_singular' => 'Integration System',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'system_name'          => 'System Name',
            'system_name_helper'   => ' ',
            'username'             => 'Username',
            'username_helper'      => ' ',
            'password'             => 'Password',
            'password_helper'      => ' ',
            'system_status'        => 'System Status',
            'system_status_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'redeemVoucher' => [
        'title'          => 'Redeem Voucher',
        'title_singular' => 'Redeem Voucher',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'voucher_code'              => 'Voucher Code',
            'voucher_code_helper'       => ' ',
            'requester'                 => 'Requester',
            'requester_helper'          => ' ',
            'external_reference'        => 'External Reference',
            'external_reference_helper' => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],

];
