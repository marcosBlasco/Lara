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
            <a href="/jobs/{{ $job['id'] }}" class="rounded-lg hover:underline block px-4 py-6 border border-gray-200">    
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: pays {{ $job['salary'] }} per year
                </div>
            </a>
        @endforeach
        @if (session('error'))
            <div class="text-red alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{ $jobs->links() }}
    </div>
   
</x-layout>