<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email','no_tlp','alamat'];
    public $timestamps = false;

    function books(){
        return $this->hasOne(Peminjaman::class, 'book_id','id');
    }
}
