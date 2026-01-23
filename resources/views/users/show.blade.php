<x-layout>
    <x-slot:heading>
        User page
    </x-slot:heading>
    
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base/7 font-semibold text-white">User Details</h3>
            <p class="mt-1 max-w-2xl text-sm/6 text-gray-400">modificar campo.</p>
        </div>
        <div class="mt-6 border-t border-white/10">
            <dl class="divide-y divide-white/10">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-100">User First and Last name</dt>
                    <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                        <a href="/users/{{ $user->id }}" 
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
                            {{ $user->first_name }} {{ $user->last_name }}
                            {{-- Imagen del employer --}}
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}"
                                    alt="{{ $user->first_name }} {{ $user->last_name }}"
                                    class="w-8 h-8 rounded-full object-cover">
                            @else
                                {{-- Fallback: iniciales o default svg/avatar --}}
                            @endif
                        </a>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-100">Email</dt>
                    <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </div>
            </dl>
        </div>
    </div>
    <hr class="my-4 border-white/20">
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base/7 font-semibold text-white">Employer Details</h3>
            <p class="mt-1 max-w-2xl text-sm/6 text-gray-400">modificar campo.</p>
        </div>
        <div class="mt-6 border-t border-white/10">
            <dl class="divide-y divide-white/10">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Company name</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0 flex items-center gap-2">
                    {{-- Nombre del employer --}}
                    {{ $user->employer->name }}
                    {{-- Imagen del employer --}}
                    @if($user->employer->logo)
                        <img src="{{ asset('storage/' . $user->employer->logo) }}"
                            alt="{{ $user->employer->name }} logo"
                            class="w-8 h-8 rounded-full object-cover">
                    @else
                        {{-- Fallback: iniciales o default svg/avatar --}}
                        <x-company-logo name="{{ $user->employer->name }}" class="w-16 h-16"/>
                    @endif
                </dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Description</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $user->employer->description ?? 'no description' }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Website</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $user->employer->website ?? 'no Website' }}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-100">Location</dt>
                <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">{{ $user->employer->location ?? 'no location informed' }}</dd>
            </div>
            
            </dl>
        </div>
    </div>

    <p>
        <x-button href="/users/{{ $user -> id }}/edit" class="mt-6">Edit User</x-button>
    </p>
    
    <hr class="my-4 border-white/20">
    
    
    <div class="px-4 sm:px-0">
        <h3 class="text-base/7 font-semibold text-white">Published Jobs</h3>
        <p class="mt-1 max-w-2xl text-sm/6 text-gray-400"></p>
    </div>
    @foreach ($user->employer->jobs as $job)
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
</x-layout>