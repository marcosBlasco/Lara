<x-layout>
    <x-slot:heading>
        Register page
    </x-slot:heading>
    <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-white">Create a new User Account</h2>
            <p class="mt-1 text-sm/6 text-gray-400">We just need some details here.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name*</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="first_name" type="text" :value="old('first_name')" name="first_name" required />
                            <x-form-error name='first_name'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name*</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="last_name" type="text" :value="old('last_name')" name="last_name" required/>
                            <x-form-error name='last_name'/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email*</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" type="email" name="email" :value="old('email')" placeholder="jhon.doe@mail.com" required/>
                            <x-form-error name='email'/>
                        </div>
                    </x-form-field>
                    {{-- Avatar usuario --}}
                    
                    <x-form-field class="sm:col-span-6">
                        <x-form-label for="avatar">Profile Image</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="avatar" type="file" name="avatar" @change="preview($event)" />
                            <x-form-error name="avatar" />
                        </div>
                    </x-form-field>


                    <div 
                        class="w-32 h-32 relative overflow-hidden rounded sm:col-span-6"
                        x-data="avatarPreview()"
                        >
                        <!-- Imagen subida -->
                        <img
                            x-show="preview"
                            :src="preview"
                            class="absolute inset-0 w-full h-full object-cover"
                        >

                        <!-- Imagen por defecto -->
                        <img
                            x-show="!preview"
                            src="{{ asset('images/default-user.png') }}"
                            class="absolute inset-0 w-full h-full object-cover opacity-70"
                        >
                        <!-- Botón eliminar -->
                    <button
                        x-show="preview"
                        @click.prevent="reset()"
                        type="button"
                        class="absolute top-1 right-1 bg-black/60 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm hover:bg-black"
                    >
                        ✕
                    </button>
                    </div>

                    <script>
                        function avatarPreview() {
                        return {
                            preview: null,
                            objectUrl: null,
                            input: null,

                            init() {
                            this.input = document.getElementById('avatar');
                            if (!this.input) return;

                            this.input.addEventListener('change', e => {
                                if (e.target.files && e.target.files[0]) {
                                if (this.objectUrl) URL.revokeObjectURL(this.objectUrl);
                                this.objectUrl = URL.createObjectURL(e.target.files[0]);
                                this.preview = this.objectUrl;
                                }
                            });
                            },

                            reset() {
                            if (this.objectUrl) URL.revokeObjectURL(this.objectUrl);
                            this.preview = null;
                            this.objectUrl = null;
                            this.input.value = '';
                            }
                        }
                    }
                    </script>
                                            
                    
                    <!-- ---------------------------------------------------------- -->

                    <div class="sm:col-span-6">
                        <h2 class="text-base/7 font-semibold text-white">
                            Company/Employer information
                        </h2>

                        <p class="mt-1 text-sm/6 text-gray-400">
                            You can upload these now or change them later.
                        </p>

                        {{-- Aviso --}}
                        <div class="mt-4 flex gap-2 rounded-md bg-white/5 p-3 text-sm text-gray-300">
                            <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                            </svg>
                            <span>
                                If you don’t complete the company information, your profile data
                                will be used by default. You can edit everything later.
                            </span>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        </div>
                    </div>

                    <!-- ---------------------------------------------------------- -->

                        <x-form-field class="">
                            <x-form-label for="company_name">Company Name</x-form-label>
                            <div class="mt-2">
                                <x-form-input id="company_name" placeholder="Company/Organization" type="text" :value="old('company_name')" name="company_name"/>
                                <x-form-error name='company_name'/>
                            </div>
                        </x-form-field>
                        
                        <x-form-field class="">
                            <x-form-label for="description">Description</x-form-label>
                            <div class="mt-2">

                                <x-form-textarea
                                    id="description"
                                    name="description"
                                    placeholder="A company dedicated to the development of cloud infrastructure, founded in 2010. We offer the highest level of reliability to our clients and a supportive environment that fosters both personal and professional growth for our team, which continues to expand."
                                    >{{ old('description') }}</x-form-textarea>
                            </div>
                        </x-form-field>
                        

                        <x-form-field class="">
                        <x-form-label for="website">Website</x-form-label>
                            <div class="mt-2">
                                <x-form-input id="website" placeholder="www.mycompany.com" type="text" :value="old('website')" name="website"/>
                                <x-form-error name='website'/>
                            </div>
                        </x-form-field>
                        
                        
                        
                        
                        

                        {{-- Logo employer --}}
                        <x-form-field>
                            <x-form-label for="company_logo">Company Logo</x-form-label>
                            <div class="mt-2">
                                <x-form-input id="company_logo" type="file" name="company_logo" />
                                <x-form-error name="company_logo" />
                            </div>
                        </x-form-field>
                        
                        
                        <div
                            class="w-32 h-32 relative overflow-hidden rounded sm:col-span-6"
                            x-data="companyLogoPreview()"
                            >
                            <!-- Logo subido -->
                            <img
                                x-show="logo"
                                :src="logo"
                                class="absolute inset-0 w-full h-full object-cover"
                            >

                            <!-- SVG por company_name -->
                            <svg
                                x-show="!logo"
                                class="absolute inset-0 w-full h-full"
                                viewBox="0 0 256 256"
                            >
                                <rect width="256" height="256" rx="32" fill="#E5E7EB"/>
                                <text
                                x="128"
                                y="128"
                                text-anchor="middle"
                                dominant-baseline="middle"
                                font-size="36"
                                font-weight="600"
                                fill="#374151"
                                x-text="companyName || 'ACME'"
                                ></text>
                            </svg>
                            <!-- Botón eliminar -->
                            <button
                                x-show="logo"
                                @click.prevent="reset()"
                                type="button"
                                class="absolute top-1 right-1 bg-black/60 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm hover:bg-black"
                            >
                                ✕
                            </button>
                        </div>
                        
                        
                        
                        
                        <script>
                            function companyLogoPreview() {
                            return {
                                companyName: 'ACME',
                                logo: null,
                                objectUrl: null,
                                logoInput: null,

                                init() {
                                const nameInput = document.getElementById('company_name');
                                this.logoInput = document.getElementById('company_logo');

                                if (nameInput) {
                                    this.companyName = nameInput.value || 'ACME';
                                    nameInput.addEventListener('input', e => {
                                    this.companyName = e.target.value || 'ACME';
                                    });
                                }

                                if (this.logoInput) {
                                    this.logoInput.addEventListener('change', e => {
                                    if (e.target.files && e.target.files[0]) {
                                        if (this.objectUrl) URL.revokeObjectURL(this.objectUrl);
                                        this.objectUrl = URL.createObjectURL(e.target.files[0]);
                                        this.logo = this.objectUrl;
                                    }
                                    });
                                }
                                },

                                reset() {
                                if (this.objectUrl) URL.revokeObjectURL(this.objectUrl);
                                this.logo = null;
                                this.objectUrl = null;
                                this.logoInput.value = '';
                                }
                            }
                        }
                        </script>
                    
                    
                    
                    
                    
                    
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" type="password" name="password" required/>
                            <x-form-error name='password'/>
                        </div>
                    </x-form-field>
                    
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password_confirmation" type="password" name="password_confirmation" required/>
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
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>