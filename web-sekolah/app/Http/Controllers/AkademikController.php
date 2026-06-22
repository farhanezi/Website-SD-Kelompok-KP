<?php

namespace App\Http\Controllers;

use App\Models\KalenderAkademik;

class AkademikController extends Controller
{
    public function kalender()
    {
        $kaldik = KalenderAkademik::query()
            ->where('is_active', true)
            ->orderBy('urutan')
            ->orderByDesc('tahun_ajaran')
            ->get();

        return view('Akademik.kalender_akademik', [
            'judulKaldik' => 'KALDIK KOTA SEMARANG',
            'kaldik' => $kaldik,
        ]);
    }
}
