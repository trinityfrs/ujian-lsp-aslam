@props(['href', 'icon', 'active' => false, 'open' => true])

<a href="{{ $href }}" class="flex items-center px-4 py-2 text-sm transition rounded-md hover:bg-gray-700"
    :class="{ 'bg-blue-500': {{ $active ? 'true' : 'false' }} }">
    <span class="text-lg material-icons-outlined"
        :class="open !? 'hidden w-auto' : 'block w-0'">
        <i class="{{ $icon }}"></i>
    </span>

    <span class="ml-3 transition-all duration-300"
        :class="open ? 'opacity-100 w-auto' : 'opacity-0 w-0 overflow-hidden hidden'">
        {{ $slot }}
    </span>
</a>
