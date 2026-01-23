<x-layout>
    <x-slot:heading>
        Job page
    </x-slot:heading>
    
    <x-sideApplicationbar :employers="$employers"></x-sideApplicationbar>

    <div>
    <div class="px-4 sm:px-0">
        <h3 class="text-base/7 font-semibold text-white">Job Details</h3>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-400">modificar campo.</p>
    </div>
    <div class="mt-6 border-t border-white/10">
        <dl class="divide-y divide-white/10">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-100">Employer</dt>
            <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                <a href="/employers/{{ $job->employer->id }}" 
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
                    {{ $job->employer->name }}
                    {{-- Imagen del employer --}}
                    @if($job->employer->logo)
                        <img src="{{ asset('storage/' . $job->employer->logo) }}"
                            alt="{{ $job->employer->name }} logo"
                            class="w-8 h-8 rounded-full object-cover">
                    @else
                        {{-- Fallback: iniciales o default svg/avatar --}}
                        <x-company-logo name="{{ $job->employer->name }}" class="w-16 h-16"/>
                    @endif
                </a>
            </dd>
        </div>


        


        
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-100">Position</dt>
            <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $job['title'] }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-100">Salary</dt>
            <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">${{ $job['salary'] }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-100">About</dt>
            <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $job['description'] }}.</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-100">Open</dt>
            <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">from: {{ $job->published_from?->format('d/m/Y') }} 
                to: {{ $job->published_until?->format('d/m/Y') }}.</dd>
        </div>
        
        </dl>
    </div>
</div>
    @can('edit', $job)
        <p>
            <x-button href="/jobs/{{ $job -> id }}/edit" class="mt-6">Edit Job</x-button>
        </p>


<hr class="my-4 border-white/20">

        <h3 class="mt-6">
            Applicants
        </h3>
        @foreach ($job->applications as $application)
            <ul role="list" class="divide-y divide-white/5">
                <li class="flex flex-col sm:flex-row justify-between gap-x-6 py-5">

                    <!-- Bloque izquierdo: avatar + user info -->
                    <div class="flex flex-col sm:flex-row min-w-0 gap-x-4">
                        <img src="{{ $application->user->avatar_url }}" 
                            alt="{{ $application->user->first_name }} avatar"
                            class="w-12 h-12 flex-none rounded-full bg-gray-800 ring-1 ring-white/10 mb-2 sm:mb-0" />
                        
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-white">{{ $application->user->first_name }} {{ $application->user->last_name }}</p>
                            <p class="mt-1 truncate text-xs/5 text-gray-400">{{ $application->user->email }}</p>
                        </div>
                    </div>

                    <!-- Bloque derecho: message + created_at -->
                    <div class="flex flex-col sm:items-end mt-2 sm:mt-0">
                        <p class="text-sm/6 text-white">Message: {{ $application->message }}</p>
                        <p class="mt-1 text-xs/5 text-gray-400">Application time: {{ $application->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </li>
            </ul>
        @endforeach
    @endcan
            
    @cannot('edit', $job)
        @php
    $userApplication = $job->applications()
        ->where('user_id', auth()->id())
        ->first();
    @endphp

    @if ($userApplication)
        <div class="mt-6">
            <p>You've applied on {{ $userApplication->created_at->format('d/m/Y H:i') }}</p>
            <p>Message: {{ $userApplication->message }}</p>
        </div>
    @else
        <div class="mt-6 text-gray-500">
            <p>You haven’t applied to this job yet.</p>
        </div>
    @endif
    @endcannot
    @can('apply', $job)
        <p>
            <x-button href="/jobs/{{ $job -> id }}/apply" class="mt-6">Apply for this job</x-button>
        </p>

    @endcan

    @if (session('success'))
        <div class="mb-4 rounded-md bg-green-100 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

</x-layout>