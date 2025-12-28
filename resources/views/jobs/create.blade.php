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
                <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-black dark:text-white">Title</label>
                <div class="mt-2">
                    <div class="flex items-center rounded-md bg-gray-900 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                    <input id="title" type="text" name="title" placeholder="Team Leader" required class="block min-w-0 grow bg-transparent py-1.5 pr-3 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"/>
                    </div>
                    @error('title')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <div class="sm:col-span-4">
                <label for="salary" class="block text-sm/6 font-medium text-black dark:text-white">Salary</label>
                <div class="mt-2">
                    <div class="flex items-center rounded-md bg-gray-900 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                    <input id="salary" type="text" name="salary" placeholder="$50.000 per year" required class="block min-w-0 grow bg-transparent py-1.5 pr-3 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"/>
                    </div>
                    @error('salary')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            </div>
            </div>

            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Notifications</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs"><button type="button" class="text-sm font-semibold text-gray-700 hover:text-gray-900
                   dark:text-gray-300 dark:hover:text-white">Cancel</button></a>
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
        </div>
    </form>

</x-layout>