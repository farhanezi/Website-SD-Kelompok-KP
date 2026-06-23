<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'   => 'required|string|max:150',
            'email'  => 'required|email|max:191',
            'subjek' => 'nullable|string|max:200',
            'pesan'  => 'required|string|max:5000',
        ], [
            'nama.required'  => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'pesan.required' => 'Pesan tidak boleh kosong.',
        ]);

        Pesan::create($data);

        return back()
            ->with('kontak_success', 'Pesan Anda telah terkirim. Terima kasih, kami akan segera menindaklanjuti.')
            ->withFragment('kontak');
    }
}
