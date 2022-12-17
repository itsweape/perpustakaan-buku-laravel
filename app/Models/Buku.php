<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $dates = ['tgl_terbit'];
    public function album() {
        return $this->hasMany(Galeri::class);
    }

    public function photos(){
        return $this->hasMany(Galeri::class, 'id_buku', 'id');
    }

    public function bukuComment(){
        return $this->hasMany(Comment::class, 'id_buku', 'id');
    }
}

