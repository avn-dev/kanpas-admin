<?php

namespace App\Http\Controllers;


use App\Models\Allergen;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\AllergenResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show()
    {
        // Cache assembled menu for 60s; tweak as you like
        return Cache::remember('menu:v1', now()->addSeconds(60), function () {
            // Eager-load everything we need, including pivot prices
            // $articles = Article::query()
            //     ->with([
            //         'allergens:id,name',
            //         'optionGroup:id,name',
            //         'options:id,name,price',
            //         'category:id,name',
            //     ])
            //     ->get();

            $categories = Category::query()
                ->with([
                    'articles' => function ($q) {
                        $q->select('id', 'category_id', 'name', 'description', 'image_path', 'price', 'option_group_id')
                          ->with([
                              'allergens' => function ($q) {
                                  $q->orderBy('position');
                              },
                              'options' => function ($q) {
                                  $q->orderBy('position');
                              },
                          ])
                          ->orderBy('position');
                    }
                ])
                ->orderBy('position')
                ->get(['id', 'name']);

            $allergens = Allergen::query()->get(['id', 'name']);

            return response()->json([
                //'articles'   => ArticleResource::collection($articles),
                //'allergens'  => AllergenResource::collection($allergens),
                'categories' => CategoryResource::collection($categories),
                'updated_at' => now()->toISOString(),
            ]);
        });
    }
}