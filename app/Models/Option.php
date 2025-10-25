<?php

namespace App\Models;

use App\Models\Pivots\ArticleOption as ArticleOptionPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['option_group_id', 'name'];

    /**
     * Get the group this option belongs to.
     */
    public function optionGroup(): BelongsTo
    {
        return $this->belongsTo(OptionGroup::class);
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_option')
            ->using(ArticleOptionPivot::class)
            ->withPivot(['price'])
            ->withTimestamps();
    }
}
