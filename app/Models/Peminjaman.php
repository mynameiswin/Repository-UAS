<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'book_id', 'tgl_pinjam', 'tgl_kembali'];
    public $timestamps = false;
    
}
