<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'action',
        'entity_type',
        'entity_id',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];}
