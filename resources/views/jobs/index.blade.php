<x-layout>
    
    <x-slot:heading>
        Job listing page
    </x-slot:heading>

    <x-sideApplicationbar :employers="$employers"></x-sideApplicationbar>
    <x-sidebar :employers="$employers"/>
    @guest
        <h1 class="rounded-lg mb-6 block px-4 py-6">Sign up and post your job offer</h1>
    @endguest
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <ul role="list" class="divide-y divide-white/5">
                <a href="/jobs/{{ $job['id'] }}" class="rounded-lg hover:underline block px-4 py-6 border border-gray-200">
                    <li class="flex flex-col sm:flex-row justify-between gap-x-6 py-5">
                        <!-- Bloque izquierdo: logo + employer info -->
                        <div class="flex sm:flex-row min-w-0 gap-x-4">
                            <!-- Logo -->
                            <div class="flex items-start mb-2 sm:mb-0">
                                <dd class="mt-1 text-sm/6 text-gray-400 flex items-center gap-2">
                                    @if($job->employer->logo)
                                        <img src="{{ asset('storage/' . $job->employer->logo) }}"
                                            alt="{{ $job->employer->name }} logo"
                                            class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <x-company-logo name="{{ $job->employer->name }}" class="w-16 h-16"/>
                                    @endif
                                </dd>
                            </div>

                            <!-- Nombre del employer + título del job -->
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold text-white">{{ $job->employer->name }}</p>
                                <p class="mt-1 truncate text-xs/5 text-gray-400">{{ $job['title'] }}</p>
                            </div>
                        </div>

                        <!-- Bloque derecho: salary + description -->
                        <div class="flex flex-col sm:items-end mt-2 sm:mt-0">
                            <p class="text-sm/6 text-white">Salary: {{ $job->salary }}</p>
                            <p class="mt-1 text-xs/5 text-gray-400">{{ Str::limit($job->description, 30, '...') }}</p>
                        </div>
                    </li>
                </a>
            </ul>
        @endforeach
        @if (session('error'))
            <div class="text-red alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{ $jobs->links() }}
    </div>
   
</x-layout>