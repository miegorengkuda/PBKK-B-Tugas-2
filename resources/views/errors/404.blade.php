@extends('layouts.app')

@section('title', '404 — Tidak Ditemukan')

@section('content')

    <div class="max-w-lg mx-auto py-20">

        {{-- Error Code --}}
        <div class="border-b border-slate-200 pb-6 mb-6">
            <span class="font-mono text-sm text-gray-400">Error</span>
            <h1 class="text-6xl font-black tracking-tighter text-gray-900 mt-1">404</h1>
        </div>

        {{-- Message --}}
        <div class="mb-8">
            <h2 class="text-lg font-bold text-gray-900 mb-2">Halaman tidak ditemukan</h2>
            <p class="text-sm text-gray-500 leading-relaxed">
                URL yang Anda akses tidak cocok dengan rute manapun. Periksa kembali alamat atau gunakan navigasi di bawah.
            </p>
        </div>

        {{-- Valid Format Reference --}}
        <div class="border border-slate-200 bg-white mb-8">
            <div class="px-4 py-2.5 border-b border-slate-200 bg-gray-50">
                <span class="text-xs font-mono text-gray-400 uppercase tracking-widest">Format URL yang valid</span>
            </div>
            <div class="divide-y divide-slate-100 text-sm">
                <div class="px-4 py-2.5 flex items-center gap-3">
                    <span class="text-green-600 text-xs">&#x2713;</span>
                    <code class="font-mono text-gray-600">/dashboard/mahasiswa/5025231160</code>
                </div>
                <div class="px-4 py-2.5 flex items-center gap-3">
                    <span class="text-green-600 text-xs">&#x2713;</span>
                    <code class="font-mono text-gray-600">/dashboard/agent/Research Agent</code>
                </div>
                <div class="px-4 py-2.5 flex items-center gap-3">
                    <span class="text-green-600 text-xs">&#x2713;</span>
                    <code class="font-mono text-gray-600">/dashboard/hitung-ipk/3.75/3.80</code>
                </div>
                <div class="px-4 py-2.5 flex items-center gap-3 bg-red-50/50">
                    <span class="text-red-500 text-xs">&#x2717;</span>
                    <code class="font-mono text-gray-500">/dashboard/mahasiswa/12345</code>
                    <span class="text-xs text-red-400 ml-auto">NRP harus 10 digit</span>
                </div>
            </div>
        </div>

        {{-- Action --}}
        <a href="{{ route('home') }}"
           class="inline-block px-5 py-2.5 text-sm font-semibold text-white bg-its hover:bg-blue-900 transition">
            &larr; Kembali ke Home
        </a>

    </div>

@endsection
