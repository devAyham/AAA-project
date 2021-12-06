<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'img' => $this->img ,
            'user_id' => $this->user_id ,
            'quantity' => $this->quantity ,
            'views' => $this->views ,
            'category' => $this->category ,
            'price' => $this->price ,
            'new_price' => $this->new_price ,
            'expiration_date' => $this->expiration_date ,
            'contact_informations' => $this->contact_informations ,
            'created_at' => $this->created_at->format('d/m/y'),
            'created_at' => $this->created_at->format('d/m/y')
        ] ;
    }
}
