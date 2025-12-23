<x-layout>
    <x-slot:heading>
        Job listing page
    </x-slot:heading>
    <h1>Glad to say hello from the Job listing web page</h1>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="rounded-lg hover:underline block px-4 py-6 border border-gray-200">    
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: pays {{ $job['salary'] }} per year
                </div>
            </a>
        @endforeach

        {{ $jobs->links() }}
</div>
</x-layout>