<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tugas 2 PBKK') — ITS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        its: '#013880',
                    },
                    fontFamily: {
                        sans: ['Inter', 'Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                        mono: ['JetBrains Mono', 'Fira Code', 'Consolas', 'monospace'],
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 font-sans antialiased">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="text-sm font-bold tracking-tight uppercase text-its">
                    PBKK — Tugas 2
                </a>
                <div class="flex items-center gap-1 text-sm">
                    <a href="{{ route('home') }}"
                       class="px-3 py-1.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition font-medium">
                        Home
                    </a>
                    <a href="{{ route('mahasiswa.detail', '5025241112') }}"
                       class="px-3 py-1.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition font-medium">
                        Profil
                    </a>
                    <a href="{{ route('agent.idea') }}"
                       class="px-3 py-1.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition font-medium">
                        Agent AI
                    </a>
                    <a href="{{ route('ipk.kalkulator', ['ip1' => '3.50', 'ip2' => '3.45']) }}"
                       class="px-3 py-1.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition font-medium">
                        Kalkulator IPK
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-slate-200 mt-16">
        <div class="max-w-5xl mx-auto px-6 py-5 flex items-center justify-between text-xs text-gray-400">
            <span>&copy; {{ date('Y') }} Institut Teknologi Sepuluh Nopember</span>
            <span class="font-mono">Tugas 2 PBKK — Laravel Routing</span>
        </div>
    </footer>

</body>
</html>
