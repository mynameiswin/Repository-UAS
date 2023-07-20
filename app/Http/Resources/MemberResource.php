<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'nama'=>$this->nama,
            'email'=>$this->email,
            'no_tlp'=>$this->no_tlp,
            'alamat'=>$this->alamat,
            'buku_pinjaman'=>$this->books
        ];
    }
}
