<x-layout>
    <x-slot:heading>
        Apply for this job
    </x-slot:heading>
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
                    {{-- Nombre del employer --}}
                    {{ $job->employer->name }}
                    <x-company-logo name="{{ $job->employer->name }}" class="w-16 h-16"/>
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


    <form method="POST" action="/jobs/{{ $job->id }}/apply">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <!-- <h2 class="text-base/7 font-semibold text-white">Create a new job</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We just need some details here.</p> -->
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">User</x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="title" 
                                type="text" 
                                name="title" 
                                value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" 
                                required 
                                disabled/>
                            <x-form-error name='title'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" type="email" name="email" value="{{ auth()->user()->email }}" required/>
                            <x-form-error name='email'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="message">Message</x-form-label>
                        <div class="mt-2">

                            <x-form-textarea
                                id="message"
                                name="message"
                                placeholder="LinkedIn link/Brief description"
                                >{{ old('message') }}</x-form-textarea>
                        </div>
                    </x-form-field>
                    
                    <script>
                        const publishedFrom = document.getElementById('published_from');
                        const publishedUntil = document.getElementById('published_until');

                        publishedFrom.addEventListener('change', () => {
                            // When the user selects a date, update the minimum value of published_until
                            publishedUntil.min = publishedFrom.value || '{{ \Carbon\Carbon::today()->toDateString() }}';

                            // If the published_until date is earlier than the new published_from date, reset it
                            if (publishedUntil.value && publishedUntil.value < publishedUntil.min) {
                                publishedUntil.value = publishedUntil.min;
                            }
                        });
                    </script>
                </div>
            </div>
            @if (session('error'))
            <div class="mb-4 mt-4 rounded-md bg-red-100 px-4 py-3 text-red-800">
                {{ session('error') }}
            </div>
            @endif

            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Notifications</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs/{{ $job->id }}">
                <button type="button" class="text-sm font-semibold text-gray-700 hover:text-gray-900
                   dark:text-gray-300 dark:hover:text-white">
                   Cancel
                </button>
            </a>
            <x-form-button>Apply</x-form-button>
        </div>
    </form>
</x-layout>