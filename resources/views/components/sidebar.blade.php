<form
    method="GET"
    action="{{ route('jobs.index') }}"
    class="flex-1 overflow-y-auto p-6 space-y-6">    
    
    <div x-data="{ open: false }" class="relative">

        <!-- BOTÓN FILTRAR -->
        <div class="flex justify-end mb-4">
            <x-button
                type="button"
                @click="open = true"
                class="flex items-center gap-2 rounded-md bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-700"
            >
                Filter
            </x-button>
        </div>

        <!-- OVERLAY -->
        <div
            x-show="open"
            x-transition.opacity
            @click="open = false"
            class="fixed inset-0 bg-black/50 z-40"
        ></div>

        <!-- OFF-CANVAS -->
        <aside
            x-show="open"
            @keydown.escape.window="open = false"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed right-0 top-0 z-50 h-full w-full max-w-md bg-white dark:bg-gray-900 shadow-xl flex flex-col"
        >

            <!-- HEADER -->
            <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-lg font-semibold">
                    Filters
                </h2>

                <button
                    type="button"
                    @click="open = false"
                    class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                >
                    ✕
                </button>
            </div>

            <!-- BODY -->
            <div class="flex-1 overflow-y-auto p-6 space-y-6">

                <!-- EJEMPLO FILTRO -->
                <div>
                    <x-form-label class="block text-sm font-medium mb-1">
                        Employer
                    </x-form-label>
                    <select name="employer" class="w-full rounded-md border-gray-300 dark:bg-gray-800">
                        <option value="">All</option>

                        @foreach($employers as $employer)
                            <option value="{{ $employer->id }}" @selected(request('employer') == $employer->id)>{{ $employer->name }}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-form-label class="block text-sm font-medium mb-1">
                            From
                        </x-form-label>
                        <x-form-input name="published_from" type="date" class="w-full rounded-md border-gray-300 dark:bg-gray-800"/>
                    </div>

                    <div>
                        <x-form-label class="block text-sm font-medium mb-1">
                            Until
                        </x-form-label>
                        <x-form-input  name="published_until" type="date" class="w-full rounded-md border-gray-300 dark:bg-gray-800"/>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="mine" name="mine" class="rounded">
                    <label for="mine" class="text-sm">
                        My published jobs
                    </label>
                </div>
                
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="active_Jobs" name="active_Jobs" class="rounded">
                    <label for="active_Jobs" class="text-sm">
                        Active Jobs
                    </label>
                </div>

            </div>

            <!-- FOOTER -->
            <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-4 flex justify-end gap-3">
                <button
                    type="button"
                    class="rounded-md border px-4 py-2 text-sm">
                    Clean
                </button>
                <x-form-button>
                    Apply filters
                </x-form-button>
            </div>

        </aside>
    </div>
</form>