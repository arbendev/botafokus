<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiJobLog extends Model
{
    protected $fillable = [
        'raw_article_id',
        'article_id',
        'job_type',
        'status',
        'message',
        'payload',
        'result',
        'error',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'started_at'  => 'datetime',
        'finished_at' => 'datetime',
    ];
}
