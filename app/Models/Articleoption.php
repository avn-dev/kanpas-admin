<?php

namespace App\Models;

use App\Models\Pivots\ArticleOption as ArticleOptionPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articleoption extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['article_id', 'name', 'price'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
