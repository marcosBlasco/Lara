@auth
<div x-data="{ open: false }" class="relative">

    <!-- BOTÓN FILTRAR -->
    <div class="flex justify-end mb-4">
        <x-button
            type="button"
            @click="open = true"
            class="flex items-center gap-2 rounded-md bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-700">
            My applications
        </x-button>
    </div>

    <!-- OVERLAY -->
    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-40"
    ></div>

    <!-- OFF-CANVAS -->
    <aside
        x-show="open"
        @keydown.escape.window="open = false"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 z-50 h-full w-full max-w-md bg-white dark:bg-gray-900 shadow-xl flex flex-col"
    >

        <!-- HEADER -->
        <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 px-6 py-4">
            <h2 class="text-lg font-semibold">
                My applications
            </h2>

            <button
                type="button"
                @click="open = false"
                class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
            >
                ✕
            </button>
        </div>

        <!-- BODY -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6">
            
            
            @php
                // Traemos todas las postulaciones del usuario actual con el job cargado
                $applications = auth()->user()
                    ->applications()
                    ->with('job')
                    ->latest()
                    ->get();
            @endphp
            @forelse ($applications as $application)
                <div class="flex justify-between items-start border rounded p-4 hover:bg-gray-100 dark:hover:bg-gray-800">
                    
                    <div class="flex flex-col">
                        <a href="{{ route('jobs.show', $application->job) }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">
                            {{ $application->job->title }}
                        </a>
                    
                    

                        <p class="text-sm text-gray-500 dark:text-gray-400 flex m-4 items-center">
                            Applied on {{ $application->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <div class="flex items-start">
                        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                            {{-- Imagen del employer --}}
                            @if($application->job->employer->logo)
                                <img src="{{ asset('storage/' . $application->job->employer->logo) }}"
                                    alt="{{ $application->job->employer->name }} logo"
                                    class="flex items-start gap-2 w-8 h-8 rounded-full object-cover">
                            @else
                                {{-- Fallback: iniciales o default svg/avatar --}}
                                <x-company-logo name="{{ $application->job->employer->name }}" class="w-16 h-16"/>
                            @endif
                        </dd>
                    </div>
                    
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">You haven’t applied to any jobs yet.</p>
            @endforelse

            

        </div>

    </aside>
</div>
@endauth