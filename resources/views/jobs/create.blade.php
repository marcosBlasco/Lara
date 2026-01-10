<x-layout>
    <x-slot:heading>
        Job create page
    </x-slot:heading>
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Create a new job</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We just need some details here.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="title" 
                                type="text" 
                                name="title" 
                                value="{{ old('title') }}" 
                                placeholder="Team Leader" required />
                            <x-form-error name='title'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="salary" 
                                type="text" 
                                value="{{ old('salary') }}"
                                name="salary" 
                                placeholder="$50.000 per year" required/>
                            <x-form-error name='salary'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2">

                            <x-form-textarea
                                id="description"
                                name="description"
                                placeholder="Work type (full-time/part-time), remote or on-site, role details, required skills"
                                required>{{ old('description') }}</x-form-textarea>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="published_from">Published from</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="published_from" 
                                type="date" 
                                value="{{ old('published_from') }}"
                                min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                name="published_from" required/>
                            <x-form-error name='published_from'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="published_until">Published until</x-form-label>
                        <div class="mt-2">
                            <x-form-input 
                                id="published_until" 
                                type="date" 
                                value="{{ old('published_until') }}"
                                min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                name="published_until" required/>
                            <x-form-error name='published_until'/>
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

            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Notifications</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs">
                <button type="button" class="text-sm font-semibold text-gray-700 hover:text-gray-900
                   dark:text-gray-300 dark:hover:text-white">
                   Cancel
                </button>
            </a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>