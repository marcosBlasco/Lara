<x-layout>
    <x-slot:heading>
        Home page
    </x-slot:heading>

<!-- HERO / WELCOME -->
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-bold mb-6">
        Welcome 👋
    </h1>

    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
        This application is a project developed with <strong>Laravel</strong> and deployed
        in a real-world environment using <strong>Nginx</strong>, designed as an end-to-end
        practice in backend development and production deployment.
    </p>

    <p class="text-lg text-gray-600 dark:text-gray-300">
        The platform allows information management, database interaction,
        route handling, controllers and views, while applying best practices
        both at the code and server levels.
    </p>
</section>

<!-- GITHUB -->
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-5xl mx-auto px-6 py-16 text-center">
        <h2 class="text-2xl font-semibold mb-4">
            Project source code
        </h2>

        <p class="text-gray-600 dark:text-gray-300 mb-6">
            The complete source code of this project is publicly available on GitHub.
        </p>

        <a
            href="https://github.com/marcosBlasco/Lara.git"
            target="_blank"
            class="inline-block rounded-md bg-indigo-500 px-6 py-3 text-white font-semibold
                   hover:bg-indigo-600 transition"
        >
            View repository on GitHub
        </a>
    </div>
</section>

<!-- TECHNOLOGIES -->
<section class="max-w-5xl mx-auto px-6 py-16">
    <h2 class="text-2xl font-semibold mb-8">
        Concepts and technologies applied
    </h2>

    <div class="grid md:grid-cols-2 gap-10">

        <!-- SERVER -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Server / Infrastructure
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Nginx as a web server</li>
                <li>Virtual hosts and subdomain configuration</li>
                <li>Deployment on an Ubuntu virtual machine</li>
                <li>SSL certificates with Let’s Encrypt and Certbot</li>
                <li>Separation of static and dynamic projects</li>
                <li>MySQL installation and integration with Laravel</li>
                <li>Directory structure and permission management</li>
            </ul>
        </div>

        <!-- LARAVEL -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Laravel Project
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Laravel routing (basic and advanced)</li>
                <li>Controllers and Blade views</li>
                <li>Reusable layouts and components</li>
                <li>Tailwind CSS integration</li>
                <li>Passing data to views and route parameters</li>
                <li>Autoloading and namespace usage</li>
                <li>Models and Eloquent ORM</li>
                <li>Database migrations and versioning</li>
                <li>Seeders for test data</li>
                <li>Full CRUD implementation</li>
                <li>Forms and CSRF protection</li>
                <li>Input data validation</li>
                <li>Results pagination</li>
            </ul>
        </div>

        <!-- CLI -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                CLI / BASH Usage
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Command-line interface usage (BASH)</li>
                <li>SSH connection setup to the virtual machine</li>
            </ul>
        </div>

    </div>
</section>

</x-layout>