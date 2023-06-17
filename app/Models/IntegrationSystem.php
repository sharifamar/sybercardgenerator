<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntegrationSystem extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'integration_systems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SYSTEM_STATUS_SELECT = [
        'Active'    => 'Active',
        'In Active' => 'In Active',
    ];

    protected $fillable = [
        'system_name',
        'username',
        'password',
        'system_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
