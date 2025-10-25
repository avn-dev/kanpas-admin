<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'              => $this->id,
            'category_id'     => $this->category_id,
            'name'            => $this->name,
            'description'     => $this->description,
            'image_path'      => $this->image_path,
            'price'           => $this->price, // entweder gesetzt ODER null (bei OptionGroup)
            'effective_price' => $this->whenAppended('effectivePrice', $this->effectivePrice()),
            'option_group'    => new OptionGroupResource($this->whenLoaded('optionGroup')),
            'allergens'       => AllergenResource::collection($this->whenLoaded('allergens')),
            // Optionen inkl. Pivot-Preis:
            'options'         => OptionResource::collection($this->whenLoaded('options')),
        ];
    }
}
