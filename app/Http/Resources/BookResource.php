<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'judul'=>$this->judul,
            'pengarang'=>$this->pengarang,
            'tgl_terbit'=>$this->tgl_terbit,
            'deskripsi'=>$this->deskripsi,
            'peminjam'=> $this->peminjam,
        ];
    }
}
