<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleOption extends Pivot
{
    protected $table = 'article_option';

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
