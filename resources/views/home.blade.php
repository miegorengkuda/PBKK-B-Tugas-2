@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- Header --}}
    <header class="border-b border-slate-200 pb-8 mb-10">
        <p class="text-xs font-mono text-gray-400 uppercase tracking-widest mb-3">Institut Teknologi Sepuluh Nopember</p>
        <h1 class="text-4xl font-black leading-tight tracking-tight text-gray-900 mb-3">
            PBKK (B)
        </h1>
        <p class="text-lg text-gray-500 max-w-xl leading-relaxed">
            Laravel Local Sandbox — Routing & Named Routes.
            Mendemonstrasikan route grouping, parameter validation, dan named route helper.
        </p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Profil Singkat — 3 col --}}
        <section class="md:col-span-3">
            <h2 class="text-xs font-mono text-gray-400 uppercase tracking-widest mb-4">Profil Mahasiswa</h2>
            <div class="border border-slate-200 bg-white">
                <table class="w-full text-sm">
                    <tbody>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-3 text-gray-400 font-medium w-36">Nama</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">{{ $profil['nama'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-3 text-gray-400 font-medium">NRP</td>
                            <td class="px-4 py-3 font-mono font-semibold text-its">{{ $profil['nrp'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-3 text-gray-400 font-medium">Jurusan</td>
                            <td class="px-4 py-3 text-gray-900">{{ $profil['jurusan'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-3 text-gray-400 font-medium">Fakultas</td>
                            <td class="px-4 py-3 text-gray-900">{{ $profil['fakultas'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100">
                            <td class="px-4 py-3 text-gray-400 font-medium">Angkatan</td>
                            <td class="px-4 py-3 font-mono text-gray-900">{{ $profil['angkatan'] }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-400 font-medium">Semester</td>
                            <td class="px-4 py-3 font-mono text-gray-900">{{ $profil['semester'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ route('mahasiswa.detail', $profil['nrp']) }}"
                   class="inline-block text-sm font-semibold text-its hover:underline">
                    Lihat detail lengkap &rarr;
                </a>
            </div>
        </section>

        {{-- Daftar Rute — 2 col --}}
        <aside class="md:col-span-2">
            <h2 class="text-xs font-mono text-gray-400 uppercase tracking-widest mb-4">Daftar Rute</h2>
            <div class="border border-slate-200 bg-white divide-y divide-slate-100">
                <a href="{{ route('home') }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition group">
                    <span class="text-sm font-medium text-gray-900">Home</span>
                    <code class="text-xs font-mono text-gray-400 group-hover:text-its transition">/</code>
                </a>
                <a href="{{ route('mahasiswa.detail', '5025241112') }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition group">
                    <span class="text-sm font-medium text-gray-900">Mahasiswa Detail</span>
                    <code class="text-xs font-mono text-gray-400 group-hover:text-its transition">/dashboard/mahasiswa/{'{nrp}'}</code>
                </a>
                <a href="{{ route('agent.idea') }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition group">
                    <span class="text-sm font-medium text-gray-900">Agent AI</span>
                    <code class="text-xs font-mono text-gray-400 group-hover:text-its transition">/dashboard/agent/{'{tema?}'}</code>
                </a>
                <a href="{{ route('ipk.kalkulator', ['ip1' => '3.50', 'ip2' => '3.45']) }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition group">
                    <span class="text-sm font-medium text-gray-900">Kalkulator IPK</span>
                    <code class="text-xs font-mono text-gray-400 group-hover:text-its transition">/dashboard/hitung-ipk/{'{..}'}</code>
                </a>
            </div>
        </aside>

    </div>

@endsection
