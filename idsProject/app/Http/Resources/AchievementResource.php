<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'badge_image' => $this->badge_image,
            'required_points' => $this->required_points,
            'achieved_at' => $this->pivot?->achieved_at,
        ];
    }
}