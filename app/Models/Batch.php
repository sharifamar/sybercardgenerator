<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'batches';

    public const GENERATED_SELECT = [
        'True'  => 'True',
        'False' => 'False',
    ];

    protected $dates = [
        'expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const VOUCHER_STATUS_SELECT = [
        'Active'    => 'Active',
        'In Active' => 'In Active',
    ];

    protected $fillable = [
        'batch_serial_number',
        'expiry_date',
        'voucher_id',
        'number_of_vouchers',
        'voucher_status',
        'generated',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getExpiryDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function voucher()
    {
        return $this->belongsTo(VoucherCategory::class, 'voucher_id');
    }
}
