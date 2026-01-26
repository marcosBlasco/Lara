<x-layout>
    <x-slot:heading>
        Employer Details
    </x-slot:heading>
    
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base/7 font-semibold text-white">Employer Details</h3>
        </div>
        <div class="mt-6 border-t border-white/10">
            <dl class="divide-y divide-white/10">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Company name</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                    <a href="/employers/{{ $employer->id }}" 
                    class=" border border-transparent
                            hover:border-gray-300
                            rounded-2xl
                            transition
                            duration-300 
                            rounded-lg mt-1 
                            text-sm/6 
                            text-gray-400 
                            sm:col-span-2 
                            sm:mt-0 flex items-center gap-2">
                        {{-- Nombre del employer --}}
                        {{ $employer->name }}
                        {{-- Imagen del employer --}}
                        @if($employer->logo)
                            <img src="{{ asset('storage/' . $employer->logo) }}"
                                alt="{{ $employer->name }} logo"
                                class="w-8 h-8 rounded-full object-cover">
                        @else
                            {{-- Fallback: iniciales o default svg/avatar --}}
                            <x-company-logo name="{{ $employer->name }}" class="w-16 h-16"/>
                        @endif
                    </a>
                </dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Description</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $employer->description ?? 'no description' }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Website</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $employer->website ?? 'no Website' }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Location</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $employer->location ?? 'no location informed' }}</dd>
            </div>
            
            </dl>
        </div>
    </div>
</x-layout>