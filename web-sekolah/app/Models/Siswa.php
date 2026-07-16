<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'deskripsi',
        'foto',
    ];

    public function fotoUrl(): ?string
    {
        if (! $this->foto) return null;
        if (Str::startsWith($this->foto, ['http://', 'https://'])) return $this->foto;
        return asset('storage/' . $this->foto);
    }
}
