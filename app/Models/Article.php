<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'raw_article_id',
        'category_id',
        'status',
        'slug',
        'title',
        'lead',
        'body',
        'hero_image_url',
        'hero_image_alt',
        'location_label',
        'published_at',
        'seo_title',
        'seo_description',
        'is_featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured'  => 'boolean',
    ];

    public function rawArticle(): BelongsTo
    {
        return $this->belongsTo(RawArticle::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
