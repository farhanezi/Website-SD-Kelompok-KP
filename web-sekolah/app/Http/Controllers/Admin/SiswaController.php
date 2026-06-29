<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $items = Siswa::latest()->paginate(20);
        return view('admin.siswa.index', compact('items'));
    }

    public function create()
    {
        return view('admin.siswa.form', ['item' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validasi($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        Siswa::create($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.form', ['item' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $data = $this->validasi($request);

        if ($request->hasFile('foto')) {
            if ($siswa->foto) Storage::disk('public')->delete($siswa->foto);
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        } else {
            unset($data['foto']);
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto) Storage::disk('public')->delete($siswa->foto);
        $siswa->delete();

        return back()->with('success', 'Data siswa berhasil dihapus.');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama'      => 'required|string|max:255',
            'nis'       => 'nullable|string|max:50',
            'kelas'     => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|max:3072',
        ]);
    }
}
