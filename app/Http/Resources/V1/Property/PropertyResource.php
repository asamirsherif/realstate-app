<?php

namespace App\Http\Resources\V1\Property;

use App\Http\Resources\V1\Location\LocationResource;
use App\Http\Resources\V1\User\ProfileResource;
use App\Http\Resources\V1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'squarefeet' => $this->square_feet,
            'type' => new PropertyTypeResource($this->type),
            'country' => new LocationResource($this->country),
            'state' => new LocationResource($this->state),
            'city' => new LocationResource($this->city),
            'user' => UserResource::collection($this->whenLoaded('user')),
        ];
    }
}
