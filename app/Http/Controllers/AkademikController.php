<?php

namespace App\Http\Controllers;

class AkademikController extends Controller
{
    /**
     * Kalender akademik (kaldik) — daftar tautan unduhan per tahun pelajaran.
     * Data masih statis; nantinya bisa diambil dari database lewat dashboard admin.
     */
    public function kalender()
    {
        $kaldik = [
            ['judul' => 'KALDIK TP 2021/2022', 'link' => '#'],
            ['judul' => 'KALDIK TP 2020/2021', 'link' => '#'],
            ['judul' => 'KALDIK TP 2019/2020', 'link' => '#'],
            ['judul' => 'KALDIK TP 2018/2019', 'link' => '#'],
        ];

        return view('Akademik.kalender_akademik', [
            'judulKaldik' => 'KALDIK KOTA SEMARANG',
            'kaldik' => $kaldik,
        ]);
    }

    /**
     * Kurikulum sekolah — konten disusun sebagai blok agar mudah dirender ulang.
     * Data masih statis; nantinya bisa diedit lewat dashboard admin.
     */
    public function kurikulum()
    {
        $blok = [
            ['tipe' => 'paragraf', 'isi' => 'Saat ini kami telah melaksanakan Kurikulum 2013 sejak Tahun Pelajaran 2017/2018.'],
            ['tipe' => 'subjudul', 'isi' => 'Prinsip Kurikulum'],
            ['tipe' => 'paragraf', 'isi' => 'Kurikulum SDN Dadapsari Semarang mengacu kepada Standar Nasional Pendidikan untuk mencapai tujuan pendidikan nasional. Standar Nasional Pendidikan terdiri dari :'],
            ['tipe' => 'ol', 'item' => ['Standar Isi', 'Standar Proses', 'Kompetensi Lulusan', 'Tenaga Pendidikan', 'Sarana Prasarana', 'Pengelolaan', 'Pembiayaan dan', 'Penilaian Pendidikan']],
            ['tipe' => 'paragraf', 'isi' => 'Pengembangan kurikulum disusun antara lain dapat memberi kesempatan peserta didik untuk :'],
            ['tipe' => 'ul', 'item' => [
                'Menanamkan sikap religius melalui pembelajaran agama untuk keimanan dan ketakwaan terhadap Tuhan Yang Maha Esa;',
                'Menanamkan kebiasaan peserta didik untuk beribadah sesuai dengan agamanya;',
                'Membantu peserta didik untuk mengenali potensi dirinya sehingga dapat berkembang optimal;',
                'Menumbuhkan semangat berprestasi, aktif, kreatif, kepada seluruh warga sekolah;',
                'Meningkatkan kemampuan peserta didik dalam menciptakan lingkungan yang bersih, sehat, di lingkungan sekitar;',
                'Menanamkan sikap nasionalisme dan cinta tanah air melalui nilai-nilai luhur yang berakar dari Pancasila.',
            ]],
            ['tipe' => 'paragraf', 'isi' => 'Pihak yang terlibat dalam penyusunan kurikulum :'],
            ['tipe' => 'ol', 'item' => ['Dinas Pendidikan', 'Guru', 'Kepala Sekolah', 'Pengawas Sekolah', 'Komite Sekolah', 'Paguyuban Orang tua/Wali Siswa']],
            ['tipe' => 'paragraf', 'isi' => 'Proses pembelajaran dilengkapi dengan :'],
            ['tipe' => 'ol', 'item' => ['Kurikulum 2013', 'Silabus', 'RPP', 'Buku Guru dan Siswa', 'Buku Referensi lain']],
            ['tipe' => 'subjudul', 'isi' => 'Sistem Pembelajaran'],
            ['tipe' => 'ol', 'item' => ['Daring dan luring', 'Penugasan', 'Sistem Proyek', 'Portofolio']],
            ['tipe' => 'subjudul', 'isi' => 'Penguatan Pendidikan Karakter (PPK)'],
            ['tipe' => 'ol', 'item' => ['PPK berbasis kelas', 'PPK berbasis budaya sekolah', 'PPK berbasis masyarakat']],
            ['tipe' => 'subjudul', 'isi' => 'Penilaian :'],
            ['tipe' => 'paragraf', 'isi' => 'Jenis ujian yang dilaksanakan di sekolah :'],
            ['tipe' => 'ul', 'item' => ['Ujian harian (praktek/teori)', 'Ujian tengah semester (teori)', 'Ujian akhir semester (teori)', 'Ujian tes kemampuan dasar (TKD)']],
            ['tipe' => 'paragraf', 'isi' => 'Penilaian hasil belajar memperhatikan hal-hal berikut :'],
            ['tipe' => 'ul', 'item' => [
                'Penilaian hasil belajar dari Kemdikbud dengan penyesuaian masa darurat',
                'mencakup aspek sikap, pengetahuan, keterampilan',
                'Portofolio, penugasan, proyek, praktek, tulis',
                'Hasil belajar antara lain berupa foto, gambar, video, animasi, karya seni dan bentuk lainnya tergantung jenis kegiatannya',
            ]],
            ['tipe' => 'paragraf', 'isi' => 'Kriteria Kenaikan dan Kelulusan :'],
            ['tipe' => 'ol', 'start' => 1, 'item' => ['Kriteria kenaikan kelas']],
            ['tipe' => 'ul', 'item' => [
                'Penilaian akhir tahun (semester 2) dapat dilakukan dengan bentuk portofolio nilai rapor dan prestasi yang diperoleh',
                'Menyelesaikan seluruh program pembelajaran pada dua semester di setiap kelas',
                'Nilai sikap spiritual dan sikap sosial minimal Baik',
                'Nilai di bawah KKM tidak lebih dari tiga (3) mata pelajaran',
                'Ketidakhadiran siswa tanpa keterangan maksimal 15% dari jumlah hari efektif tatap muka ataupun Belajar Dari Rumah (BDR)',
            ]],
            ['tipe' => 'ol', 'start' => 2, 'item' => ['Kriteria kelulusan']],
            ['tipe' => 'ul', 'item' => [
                'Menyelesaikan seluruh program pembelajaran',
                'Memperoleh nilai minimal baik untuk seluruh kelompok mata pelajaran : Agama dan akhlak mulia, kewarganegaraan dan kepribadian, Estetika, Jasmani',
                'Nilai sikap spiritual dan sikap sosial minimal Baik',
                'Kelulusan ditentukan berdasarkan nilai lima semester terakhir (kelas 4, kelas 5, dan kelas 6 semester gasal). Nilai semester genap kelas 6 dapat digunakan sebagai tambahan nilai kelulusan',
                'Hasil ujian sekolah dilakukan dalam bentuk portofolio, nilai rapor serta prestasi yang diperoleh sebelumnya',
            ]],
        ];

        return view('Akademik.kurikulum', [
            'judulKurikulum' => 'KURIKULUM SDN DADAPSARI SEMARANG',
            'blok' => $blok,
        ]);
    }

    /**
     * Guru & Staf — daftar tenaga pendidik dan tenaga kependidikan.
     * Data masih statis; nantinya bisa diambil dari database lewat dashboard admin.
     */
    public function guru()
    {
        $kepala = [
            'nama' => 'Hj. Sri Wahyuni, S.Pd., M.Pd.',
            'jabatan' => 'Kepala Sekolah',
            'nip' => '19680512 199103 2 005',
        ];

        $guru = [
            ['nama' => 'Endang Lestari, S.Pd.',      'jabatan' => 'Guru Kelas I',  'nip' => '19720310 199605 2 001'],
            ['nama' => 'Budi Santoso, S.Pd.',         'jabatan' => 'Guru Kelas II', 'nip' => '19750821 200012 1 003'],
            ['nama' => 'Rina Marlina, S.Pd.',         'jabatan' => 'Guru Kelas III','nip' => '19800704 200501 2 002'],
            ['nama' => 'Ahmad Fauzi, S.Pd.',          'jabatan' => 'Guru Kelas IV', 'nip' => '19831125 200803 1 004'],
            ['nama' => 'Siti Aminah, S.Pd.',          'jabatan' => 'Guru Kelas V',  'nip' => '19860916 201001 2 006'],
            ['nama' => 'Joko Prasetyo, S.Pd.',        'jabatan' => 'Guru Kelas VI', 'nip' => '19880207 201101 1 005'],
            ['nama' => 'Dewi Anggraini, S.Pd.I',      'jabatan' => 'Guru Pendidikan Agama Islam', 'nip' => '19900418 201402 2 003'],
            ['nama' => 'Agus Setiawan, S.Pd.',        'jabatan' => 'Guru Pendidikan Jasmani',     'nip' => '19890623 201403 1 002'],
        ];

        $staf = [
            ['nama' => 'Tri Wahyudi',        'jabatan' => 'Tata Usaha'],
            ['nama' => 'Maya Sari',          'jabatan' => 'Petugas Perpustakaan'],
            ['nama' => 'Slamet Riyadi',      'jabatan' => 'Penjaga Sekolah'],
        ];

        return view('Akademik.guru', [
            'kepala' => $kepala,
            'guru' => $guru,
            'staf' => $staf,
        ]);
    }
}
