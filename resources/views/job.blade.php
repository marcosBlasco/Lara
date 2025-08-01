<x-layout>
    <x-slot:heading>
        Job page
    </x-slot>
    <h1>Hello from the Jobs page.</h1>
    
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

</x-layout>