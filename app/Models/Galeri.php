<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'table_galeris';
    public function albums(){
        return $this->belongsTo(Buku::class, 'id_album', 'id');
    }
}
