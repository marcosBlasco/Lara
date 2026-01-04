<x-layout>
    <x-slot:heading>
        Job page
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays: {{ $job['salary'] }}  per year.
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
    @endcan
</x-layout>