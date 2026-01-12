<x-layout>
    <x-slot:heading>
        Apply for this job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job->employer->name }}: {{ $job['title'] }}</h2>
    <p>
        This job pays: {{ $job['salary'] }}  per year.
    </p>
    <p>
        Description: {{ $job['description'] }}
    </p>
    <p>
        Published from:
        {{ $job->published_from?->format('d/m/Y') }} to:
        {{ $job->published_until?->format('d/m/Y') }}
    </p>


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