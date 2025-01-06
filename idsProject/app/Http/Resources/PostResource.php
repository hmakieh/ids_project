<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content_link' => $this->content_link,
            'user' => new UserResource($this->whenLoaded('user')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'comments_count' => $this->whenCounted('comments'),
            'upvotes_count' => $this->whenCounted('upvotes'),
            'downvotes_count' => $this->whenCounted('downvotes'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}