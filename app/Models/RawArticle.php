<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawArticle extends Model
{
    protected $fillable = [
        'source_type',
        'source_name',
        'source_url',
        'source_title',
        'source_content',
        'source_published_at',
        'content_hash',
    ];
}
