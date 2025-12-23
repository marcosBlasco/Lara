<x-layout>
    <x-slot:heading>
        Job page
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays: {{ $job['salary'] }}  per year.
    </p>
    <p>
        <x-button href="/jobs/{{ $job -> id }}/edit" class="mt-6">Edit Job</x-button>
    </p>
</x-layout>