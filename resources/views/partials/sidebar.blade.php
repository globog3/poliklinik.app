<aside class="w-full bg-transparent text-slate-300 flex flex-col min-h-screen">

    {{-- ================= BRAND (LOGO KIRI ATAS) ================= --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">
            {{-- Menggunakan onerror sebagai cadangan jika file logo-bengkot.png tidak ada --}}
            <img src="{{ asset('images/logo-bengkot.png') }}" 
                 class="w-10 h-10 rounded-xl object-cover"
                 onerror="this.src='https://ui-avatars.com/api/?name=P&background=6366f1&color=fff'">

            <div>
                <div class="font-bold text-white text-lg leading-tight">
                    Poliklinik
                </div>
                <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md 
                    {{ Auth::user()->role == 'admin' ? 'bg-indigo-400/20 text-indigo-300 border border-indigo-400/30' : '' }}
                    {{ Auth::user()->role == 'dokter' ? 'bg-purple-400/20 text-purple-300 border border-purple-400/30' : '' }}
                    {{ Auth::user()->role == 'pasien' ? 'bg-amber-400/20 text-amber-300 border border-amber-400/30' : '' }}">
                    {{ Auth::user()->role }}
                </span>
            </div>
        </div>
    </div>

    {{-- ================= MENU UTAMA ================= --}}
    <div class="flex-1 overflow-y-auto px-3 py-4">

        @php
        $baseLink = "flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm transition-all duration-200";
        $inactive = "text-slate-300 hover:bg-white/10 hover:text-white";
        $active = "bg-gradient-to-r from-white/20 to-white/5 text-white font-semibold border-2 border-indigo-400";
        @endphp

        {{-- MENU ADMIN --}}
        @if(Auth::user()->role == 'admin')
            <p class="text-xs font-bold uppercase tracking-widest text-indigo-400 px-3 mb-3">Menu Admin</p>
            <div class="space-y-1 mb-6">
                <a href="{{ route('admin.dashboard') }}" class="{{ $baseLink }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                    <i class="fas fa-gauge-high w-4 text-center"></i> Dashboard
                </a>
                <a href="{{ route('pasien.index') }}" class="{{ $baseLink }} {{ request()->routeIs('pasien.*') ? $active : $inactive }}">
                    <i class="fas fa-bed-pulse w-4 text-center"></i> Manajemen Pasien
                </a>
                <a href="{{ route('dokter.index') }}" class="{{ $baseLink }} {{ request()->routeIs('dokter.*') ? $active : $inactive }}">
                    <i class="fas fa-user-doctor w-4 text-center"></i> Manajemen Dokter
                </a>
                <a href="{{ route('polis.index') }}" class="{{ $baseLink }} {{ request()->routeIs('polis.*') ? $active : $inactive }}">
                    <i class="fas fa-hospital w-4 text-center"></i> Manajemen Poli
                </a>
                <a href="{{ route('obat.index') }}" class="{{ $baseLink }} {{ request()->routeIs('obat.*') ? $active : $inactive }}">
                    <i class="fas fa-pills w-4 text-center"></i> Manajemen Obat
                </a>
            </div>
        @endif

        {{-- MENU DOKTER --}}
        @if(Auth::user()->role == 'dokter')
            <p class="text-xs font-bold uppercase tracking-widest text-purple-400 px-3 mb-3">Menu Dokter</p>
            <div class="space-y-1 mb-6">
                <a href="{{ route('dokter.dashboard') }}" class="{{ $baseLink }} {{ request()->routeIs('dokter.dashboard') ? $active : $inactive }}">
                    <i class="fas fa-gauge-high w-4 text-center"></i> Dashboard
                </a>
                <a href="{{ route('jadwal-periksa.index') }}" class="{{ $baseLink }} {{ request()->routeIs('jadwal-periksa.*') ? $active : $inactive }}">
                    <i class="fas fa-stethoscope w-4 text-center"></i> Jadwal Periksa
                </a>
            </div>
        @endif

        {{-- MENU PASIEN --}}
        @if(Auth::user()->role == 'pasien')
            <p class="text-xs font-bold uppercase tracking-widest text-amber-400 px-3 mb-3">Menu Pasien</p>
            <div class="space-y-1">
                <a href="{{ route('pasien.dashboard') }}" class="{{ $baseLink }} {{ request()->routeIs('pasien.dashboard') ? $active : $inactive }}">
                    <i class="fas fa-gauge-high w-4 text-center"></i> Dashboard
                </a>
                <a href="{{ route('pasien.daftar') }}" class="{{ $baseLink }} {{ request()->routeIs('pasien.daftar') ? $active : $inactive }}">
                    <i class="fas fa-house-medical w-4 text-center"></i> Pendaftaran Poli
                </a>
            </div>
        @endif

    </div>

    {{-- ================= TOMBOL KELUAR (LOGOUT) ================= --}}
    <div class="p-4 border-t border-white/10 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition-all shadow-lg">
                <i class="fas fa-right-from-bracket w-4"></i>
                Keluar
            </button>
        </form>
    </div>

</aside>