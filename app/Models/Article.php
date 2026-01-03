<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'raw_article_id',
        'category_id', // keep for now (backward compatibility)
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
        'publish_at'   => 'datetime',
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

    // ✅ NEW: many-to-many categories
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // OLD (can be removed later safely)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function isPublished(): bool
    {
        if ($this->status !== 'published') {
            return false;
        }

        if ($this->publish_at && $this->publish_at->isFuture()) {
            return false;
        }

        return true;
    }

    public function getParagraphsAttribute(): array
    {
        if (! $this->body) {
            return [];
        }

        return preg_split("/\n\s*\n/", trim($this->body));
    }
}
