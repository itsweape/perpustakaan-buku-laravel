<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public function relationBuku() {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function relationUser() {
        return $this->belongsTo(User::class, 'id_users');
    }
}
