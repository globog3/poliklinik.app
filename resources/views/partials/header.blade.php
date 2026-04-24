<header class="bg-base-100 border-b border-base-300 h-16 flex items-center px-6 gap-4 sticky top-0 z-30 shadow-sm">

    {{-- Mobile Hamburger --}}
    <button onclick="toggleSidebar()" class="btn btn-square btn-ghost lg:hidden">
        <i class="fas fa-bars w-5 h-5"></i>
    </button>

    {{-- Breadcrumb --}}
    <div class="flex-1">
        <div class="flex items-center gap-2 text-sm">
            <span class="text-base-content/50">Poliklinik</span>
            <i class="fas fa-chevron-right text-[10px] text-base-content/30"></i>
            <span class="font-semibold text-base-content">
                {{ $title ?? 'Dashboard' }}
            </span>
        </div>
    </div>

    {{-- Fullscreen Button --}}
    <button onclick="toggleFullscreen()" class="btn btn-square btn-ghost hidden md:flex">
        <i id="fsIcon" class="fas fa-expand w-4 h-4"></i>
    </button>

    {{-- User Info & Profile --}}
    <div class="flex items-center gap-3 ml-2">

        <div class="text-right hidden sm:block">
            <div class="text-sm font-bold text-base-content leading-tight">
                {{-- Menggunakan 'nama' sesuai database kamu --}}
                {{ auth()->user()->nama ?? 'Pengguna' }}
            </div>
            <div class="text-[10px] uppercase tracking-wider font-medium text-base-content/50 leading-tight">
                {{ auth()->user()->role ?? 'Guest' }}
            </div>
        </div>

        <div class="avatar">
            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-primary-content shadow-md border border-white/20">
                <span class="text-sm font-bold">
                    {{-- Inisial dari kolom 'nama' --}}
                    {{ strtoupper(substr(auth()->user()->nama ?? 'U', 0, 1)) }}
                </span>
            </div>
        </div>
    </div>

</header>

<script>
    function toggleFullscreen() {
        const icon = document.getElementById('fsIcon');

        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
            if(icon) {
                icon.classList.remove('fa-expand');
                icon.classList.add('fa-compress');
            }
        } else {
            document.exitFullscreen();
            if(icon) {
                icon.classList.remove('fa-compress');
                icon.classList.add('fa-expand');
            }
        }
    }
</script>