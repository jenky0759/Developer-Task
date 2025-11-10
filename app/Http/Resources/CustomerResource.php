<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name' => $this->name,
            'reference' => $this->reference,
            'category' => $this->category ? [
                'id' => $this->category->id,
                'name' => $this->category->name
            ] : null,
            'start_date' => $this->start_date,
            'description'  => $this->description,
            'contacts' => ContactResource::collection($this->contacts)
        ];
    }
}
