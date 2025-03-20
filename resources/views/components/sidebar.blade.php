
<div x-data="{ open: true }" class="flex flex-col w-64 min-h-screen text-white transition-all duration-300 bg-gray-800" :class="open ? 'w-64' : 'w-auto items-center'">
    <div class="flex items-center justify-between p-4">
        <h1 class="text-lg font-semibold" x-show="open">Admin Panel</h1>
        <button @click="open = !open" class="text-white focus:outline-none">
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
            </svg>
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <nav class="flex flex-col mt-4" :class="open ? 'w-auto' : 'w-auto items-center'">
        <x-sidebar-link href="/admin/dashboard" icon="bi bi-house"  :active="request()->routeIs('admin.dashboard')">Data Peserta</x-sidebar-link>
        <x-sidebar-link href="/setting-sertifikat" icon="bi bi-gear"  :active="request()->routeIs('tambah.setting')">Setting</x-sidebar-link>


        <form id="logout-form" method="POST" action="{{ route('logout') }}" >
            @csrf
            <button type="submit" class="flex items-center px-4 py-2 text-sm transition rounded-md hover:bg-gray-700">
                <span class="text-lg material-icons-outlined">
                    <i class="bi bi-box-arrow-left"></i>
                </span>

                <span class="ml-3 transition-all duration-300">
                    Logout
                </span>
            </a>
        </form>

    </nav>
</div>

