@props(['active'])

<a {{ $attributes }} 
class="{{ $active ? 'bg-gray-950/50 text-white' : 'hover:bg-white/5 hover:text-white' }} block text-gray-300 rounded-md  px-3 py-2 text-sm font-medium"
aria-current="{{ $active ? 'page' : 'false' }}"
>{{ $slot }}</a>