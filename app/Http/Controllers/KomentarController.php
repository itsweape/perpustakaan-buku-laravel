<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string'
        ]);

        $komen = new Comment();
        $komen->id_users = $request->id_users;
        $komen->id_buku = $request->id_buku;
        $komen->comment = $request->comment;

        $komen->save();
        return redirect('/buku')->with('pesan', 'Komentar telah ditambahkan');
    }
}
