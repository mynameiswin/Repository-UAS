<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['judul','pengarang','tgl_terbit','deskripsi'];
    public $timestamps = false;

    function peminjam(){
        return $this->hasMany(Peminjaman::class, 'member_id', 'id');
    }
}
