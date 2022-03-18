<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'size'=>$this->getSize($this->id),
            'price'=>$this->price,
            'ingredient'=>$this->ingredient->name,
            'state'=>$this->state ? 'Activo' : 'Inactivo',
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
