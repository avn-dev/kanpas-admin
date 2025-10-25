<?php

namespace App\Models;

use App\Models\Pivots\ArticleOption as ArticleOptionPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image_path',
        'price',
        'option_group_id'
    ];

    
    /**
     * Get the category this article belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the allergens belonging to this article.
     */
    public function allergens(): BelongsToMany
    {
        return $this->belongsToMany(Allergen::class);
    }

    
    public function options(): HasMany
    {
        return $this->hasMany(ArticleOption::class);
    }

    public function effectivePrice(): ?string
    {
        if (!is_null($this->price)) {
            return $this->price;
        }

        $optionPrice = $this->options()->orderBy('article_option.price')->value('article_option.price');
        return $optionPrice ? number_format($optionPrice, 2, '.', '') : null;
    }

    public function optionGroup(): BelongsTo
    {
        return $this->belongsTo(OptionGroup::class);
    }

    public function articleOptions(): HasMany
    {
        return $this->hasMany(ArticleOptionPivot::class, 'article_id');
    }
}
