<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeminjamanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request):array
    {
        return [
            'id'=>$this->id,
            'member'=>$this->member_id,
            'book'=>$this->book_id,
            'tgl_pinjam'=>$this->tgl_pinjam,
            'tgl_kembali'=>$this->tgl_kembali
        ];
    }
}
