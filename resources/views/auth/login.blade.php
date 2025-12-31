<x-layout>
    <x-slot:heading>
        Login page
    </x-slot:heading>
    <form method="POST" action="">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Create a new job</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We just need some details here.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" type="email" name="email" placeholder="jhon.doe@mail.com" required/>
                            <x-form-error name='email'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" type="password" name="password" required/>
                            <x-form-error name='password'/>
                        </div>
                    </x-form-field>    
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
            <x-form-button>Log In</x-form-button>
        </div>
    </form>
</x-layout>