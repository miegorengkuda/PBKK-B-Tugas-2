<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tugas 2 PBKK - Laravel Local Sandbox: Routing & Named Routes
|--------------------------------------------------------------------------
|
| Rute Home, Route Grouping (prefix: dashboard), dan Fallback Route.
| Seluruh rute menggunakan named routes.
|
*/

// ──────────────────────────────────────────────
// Rute Home
// ──────────────────────────────────────────────
Route::get('/', function () {
    $profil = [
        'nama'      => 'Dafa Kumara Sahasika',
        'nrp'       => '5025241112',
        'jurusan'   => 'Teknik Informatika',
        'fakultas'  => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
        'kampus'    => 'Institut Teknologi Sepuluh Nopember (ITS)',
        'angkatan'  => 2024,
        'semester'  => 5,
    ];

    return view('home', compact('profil'));
})->name('home');

// ──────────────────────────────────────────────
// Route Grouping — Prefix "dashboard"
// ──────────────────────────────────────────────
Route::prefix('dashboard')->group(function () {

    // 1) Detail Profil Mahasiswa (NRP wajib, 10 digit angka)
    Route::get('/mahasiswa/{nrp}', function (string $nrp) {
        $mahasiswa = [
            'nama'       => 'Dafa Kumara Sahasika',
            'nrp'        => $nrp,
            'jurusan'    => 'Teknik Informatika',
            'fakultas'   => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
            'kampus'     => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'angkatan'   => 2024,
            'semester'   => 5,
            'email'      => '5025241112@student.its.ac.id',
            'matakuliah' => [
                'Pemrograman Berbasis Kerangka Kerja',
                'Rekayasa Kebutuhan',
                'Tata Kelola Teknologi Informasi',
                'Rekayasa Sistem Berbasis Pengetahuan',
                'Grafika Komputer',
                'Permodelan dan Simulasi',
                'Keamanan Informasi',
            ],
        ];

        return view('dashboard.mahasiswa', compact('mahasiswa'));
    })->where('nrp', '^[0-9]{10}$')->name('mahasiswa.detail');

    // 2) Ide Agentic AI (tema opsional)
    Route::get('/agent/{tema?}', function (?string $tema = null) {
        $tema = $tema ?? 'AI File Management Agent';

        $idea = [
            'deskripsi'  => 'Agent AI yang membantu pengguna mengelola file laptop dengan memindai metadata, mendeteksi file duplikat dan file lama, serta menganalisis isi dokumen dan gambar menggunakan Gemini Multimodal. Agent memilih tools yang relevan, melakukan reasoning untuk menentukan kondisi file, lalu memberikan rekomendasi Keep, Archive, atau Trash dengan persetujuan pengguna sebelum tindakan dilakukan.',
            'teknologi'  => ['Python', 'LangGraph', 'Gemini Multimodal', 'File System API', 'PyMuPDF / python-docx', 'Hashing', 'OpenCV / FFmpeg'],
            'use_case'   => 'Asisten pengelola file pribadi yang membantu mahasiswa membersihkan dan mengorganisasi penyimpanan laptop, seperti dokumen kuliah, file duplikat, screenshot, gambar, installer, dan file lama, tanpa harus memeriksa file satu per satu secara manual.',
            'arsitektur' => 'User memilih folder → Agent memindai file → mengambil metadata → memfilter kandidat → memilih tool yang relevan → menganalisis metadata, duplikat, teks, atau gambar → melakukan reasoning dengan Gemini → memberikan rekomendasi Keep / Archive / Trash → meminta persetujuan pengguna → memindahkan file ke Archive atau Recycle Bin.',
        ];

        return view('dashboard.agent', compact('tema', 'idea'));
    })->name('agent.idea');

    // 3) Kalkulator IPK (dua IP semester, menerima float)
    Route::get('/hitung-ipk/{ip1}/{ip2}', function (string $ip1, string $ip2) {
        $ip1   = (float) $ip1;
        $ip2   = (float) $ip2;
        $total = $ip1 + $ip2;
        $rata  = $total / 2;

        // Tentukan predikat berdasarkan rata-rata
        $predikat = match (true) {
            $rata >= 3.50 => 'Cum Laude',
            $rata >= 3.00 => 'Sangat Memuaskan',
            $rata >= 2.50 => 'Memuaskan',
            $rata >= 2.00 => 'Cukup',
            default       => 'Kurang',
        };

        return view('dashboard.ipk', compact('ip1', 'ip2', 'total', 'rata', 'predikat'));
    })->where(['ip1' => '[0-9]+(\.[0-9]+)?', 'ip2' => '[0-9]+(\.[0-9]+)?'])
      ->name('ipk.kalkulator');

});

// ──────────────────────────────────────────────
// Fallback Route — Custom 404
// ──────────────────────────────────────────────
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
})->name('fallback');
