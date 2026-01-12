<x-layout>
    <x-slot:heading>
        Job page
    </x-slot:heading>
    
    <x-sideApplicationbar :employers="$employers"></x-sideApplicationbar>

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
    @can('edit', $job)
        <p>
            <x-button href="/jobs/{{ $job -> id }}/edit" class="mt-6">Edit Job</x-button>
        </p>

        @foreach ($job->applications as $application)
                        
            <div class="font-bold text-blue-500 text-sm mt-4">
                <p>User: {{ $application->user->first_name }} {{ $application->user->last_name }}</p>
            </div>
            <div>
                <p><strong>Contact mail: </strong>: {{ $application->user->email }}</p>
            </div>
            <div>
                <p>Message: {{ $application->message }}</p>
            </div>
            <div>
                <p>Application time: {{ $application->created_at }}</p>
            </div>
                
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