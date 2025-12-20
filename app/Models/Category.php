<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'seo_title',
        'seo_description',
        'order_index',
        'active',
    ];

    protected $casts = [
        'active'      => 'boolean',
        'order_index' => 'integer',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
