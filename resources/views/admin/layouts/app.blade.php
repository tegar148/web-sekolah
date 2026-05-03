<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal') - SMKN 1 Maesan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .brand-font { font-family: 'Outfit', sans-serif; }
        .glass-topbar { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(226, 232, 240, 0.8); }
    </style>
</head>
<body class="bg-slate-50 antialiased text-slate-800">
    <div class="flex min-h-screen">
        
        <!-- Premium Sidebar -->
        <aside class="w-[260px] bg-slate-950 text-slate-300 flex flex-col shrink-0 fixed inset-y-0 left-0 z-40 shadow-2xl shadow-slate-900/50">
            <!-- Logo -->
            <div class="px-6 pt-8 pb-10 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/30 shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.315 48.315 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg brand-font leading-tight tracking-wide">Portal Admin</h1>
                    <p class="text-[9px] text-blue-300/80 uppercase tracking-[0.2em] mt-0.5 font-bold">SMKN 1 Maesan</p>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="flex-1 flex flex-col gap-2 px-4 pt-2">
                <div class="px-2 mb-2 text-[10px] font-bold uppercase tracking-widest text-slate-500">Menu Utama</div>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" /></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.sections.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.sections.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.sections.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42" /></svg>
                    Landing Editor
                </a>

                <a href="{{ route('admin.media.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.media.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.media.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                    Media Manager
                </a>

                <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.fasilitas.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.fasilitas.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    Fasilitas Manager
                </a>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.berita.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.berita.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" /></svg>
                    Berita Manager
                </a>

                <a href="{{ route('admin.prestasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.prestasi.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.prestasi.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" /></svg>
                    Prestasi Manager
                </a>

                <a href="{{ route('admin.guru.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.guru.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.guru.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    Guru Manager
                </a>

                <a href="{{ route('admin.lowongan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-medium transition-all duration-300 {{ request()->routeIs('admin.lowongan.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-900/40 border border-blue-500/50' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.lowongan.*') ? 'text-white' : 'opacity-70' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" /></svg>
                    Lowongan Manager
                </a>
            </nav>

            <!-- Bottom Link -->
            <div class="p-4 border-t border-slate-800/80">
                <a href="/" target="_blank" class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 transition shadow-inner">
                    <svg class="w-4 h-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                    <span class="text-xs font-semibold uppercase tracking-wider">Live Site</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-[260px] flex flex-col">
            
            <!-- Glass Top Bar -->
            <header class="h-20 glass-topbar flex items-center justify-between px-10 sticky top-0 z-30">
                <div class="flex items-center gap-3">
                    <span class="text-slate-400 font-medium">Portal</span>
                    <svg class="w-4 h-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                    <span class="font-bold text-slate-800 text-lg brand-font">@yield('breadcrumb', 'Dashboard')</span>
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-4 bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
                        <div class="text-right">
                            <p class="text-[13px] font-bold text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-blue-500 uppercase tracking-widest font-semibold">{{ Auth::user()->role ?? 'Administrator' }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 text-white flex items-center justify-center font-bold text-sm shadow-md">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:text-white hover:bg-red-500 hover:shadow-lg hover:shadow-red-500/30 transition-all duration-300" title="Logout">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-10 max-w-7xl">
                <!-- Flash Messages -->
                @if(session('success'))
                <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm px-5 py-4 rounded-xl flex items-center gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-8 bg-rose-50 border border-rose-200 text-rose-800 text-sm px-5 py-4 rounded-xl shadow-sm flex gap-3">
                    <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3Z" /></svg>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="py-8 px-10 text-center border-t border-slate-200 bg-transparent mt-auto">
                <p class="text-[11px] text-slate-400 font-medium">© 2024 SMK Negeri 1 MAESAN. Digital Management System v2.1.0</p>
            </footer>
        </div>
    </div>
</body>
</html>
