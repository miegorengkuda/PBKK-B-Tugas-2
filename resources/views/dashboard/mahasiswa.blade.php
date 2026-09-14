@extends('layouts.app')

@section('title', 'Mahasiswa — ' . $mahasiswa['nrp'])

@section('content')

    {{-- Breadcrumb --}}
    <nav class="text-xs font-mono text-gray-400 mb-8">
        <a href="{{ route('home') }}" class="hover:text-its transition">Home</a>
        <span class="mx-1.5">/</span>
        <span>Dashboard</span>
        <span class="mx-1.5">/</span>
        <span class="text-gray-600">Mahasiswa</span>
        <span class="mx-1.5">/</span>
        <span class="text-its">{{ $mahasiswa['nrp'] }}</span>
    </nav>

    {{-- Header --}}
    <header class="border-b border-slate-200 pb-6 mb-8">
        <div class="flex items-baseline gap-4">
            <h1 class="text-3xl font-black tracking-tight text-gray-900">{{ $mahasiswa['nama'] }}</h1>
            <span class="font-mono text-sm text-its font-semibold">{{ $mahasiswa['nrp'] }}</span>
        </div>
        <p class="text-sm text-gray-400 mt-1">{{ $mahasiswa['jurusan'] }} — {{ $mahasiswa['kampus'] }}</p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Data Akademik — 3 col --}}
        <section class="md:col-span-3">
            <h2 class="text-xs font-mono text-gray-400 uppercase tracking-widest mb-4">Informasi Akademik</h2>
            <div class="border border-slate-200 bg-white">
                <table class="w-full text-sm">
                    <tbody>
                        @php
                            $fields = [
                                ['label' => 'Nama Lengkap', 'value' => $mahasiswa['nama'], 'mono' => false],
                                ['label' => 'NRP', 'value' => $mahasiswa['nrp'], 'mono' => true],
                                ['label' => 'Jurusan', 'value' => $mahasiswa['jurusan'], 'mono' => false],
                                ['label' => 'Fakultas', 'value' => $mahasiswa['fakultas'], 'mono' => false],
                                ['label' => 'Kampus', 'value' => $mahasiswa['kampus'], 'mono' => false],
                                ['label' => 'Angkatan', 'value' => $mahasiswa['angkatan'], 'mono' => true],
                                ['label' => 'Semester', 'value' => $mahasiswa['semester'], 'mono' => true],
                                ['label' => 'Email', 'value' => $mahasiswa['email'], 'mono' => true],
                            ];
                        @endphp
                        @foreach ($fields as $i => $field)
                            <tr class="{{ $i < count($fields) - 1 ? 'border-b border-slate-100' : '' }}">
                                <td class="px-4 py-3 text-gray-400 font-medium w-36 align-top">{{ $field['label'] }}</td>
                                <td class="px-4 py-3 {{ $field['mono'] ? 'font-mono text-its font-semibold' : 'text-gray-900' }}">
                                    {{ $field['value'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Mata Kuliah — 2 col --}}
        <aside class="md:col-span-2">
            <h2 class="text-xs font-mono text-gray-400 uppercase tracking-widest mb-4">Mata Kuliah Semester Ini</h2>
            <div class="border border-slate-200 bg-white divide-y divide-slate-100">
                @foreach ($mahasiswa['matakuliah'] as $index => $mk)
                    <div class="flex items-center gap-3 px-4 py-3">
                        <span class="font-mono text-xs text-gray-300 w-5 text-right">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-sm text-gray-800">{{ $mk }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 border-l-2 border-its pl-4">
                <p class="text-xs text-gray-500 leading-relaxed">
                    <span class="font-semibold text-gray-700">Named Route</span><br>
                    Halaman ini diakses via
                    <code class="bg-gray-100 px-1.5 py-0.5 text-xs font-mono text-gray-600">route('mahasiswa.detail', '{{ $mahasiswa['nrp'] }}')</code><br>
                    Parameter <code class="bg-gray-100 px-1.5 py-0.5 text-xs font-mono text-gray-600">{nrp}</code>
                    divalidasi dengan regex <code class="bg-gray-100 px-1.5 py-0.5 text-xs font-mono text-gray-600">^[0-9]{10}$</code>
                </p>
            </div>
        </aside>

    </div>

@endsection
