<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromptTemplate extends Model
{
    protected $fillable = [
        'key',
        'name',
        'description',
        'system_prompt',
        'user_prompt',
        'model',
        'temperature',
        'max_output_tokens',
        'variables',
        'version',
        'is_active',
    ];

    protected $casts = [
        'variables'         => 'array',
        'temperature'       => 'decimal:2',
        'is_active'         => 'boolean',
        'version'           => 'integer',
        'max_output_tokens' => 'integer',
    ];
}
