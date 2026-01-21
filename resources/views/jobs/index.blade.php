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
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="flex items-start">
                                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                                    {{-- Imagen del employer --}}
                                    @if($job->employer->logo)
                                        <img src="{{ asset('storage/' . $job->employer->logo) }}"
                                            alt="{{ $job->employer->name }} logo"
                                            class="flex items-start gap-2 w-8 h-8 rounded-full object-cover">
                                    @else
                                        {{-- Fallback: iniciales o default svg/avatar --}}
                                        <x-company-logo name="{{ $job->employer->name }}" class="w-16 h-16"/>
                                    @endif
                                </dd>
                            </div>

                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-white">{{ $job->employer->name }}</p>
                                <p class="mt-1 truncate text-xs/5 text-gray-400">{{ $job['title'] }}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-white">Salary: {{ $job->salary }}</p>
                            <p class="mt-1 text-xs/5 text-gray-400">{{ substr($job->description, 0, 100) }}</p>
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