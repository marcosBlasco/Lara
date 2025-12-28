<x-layout>
    <x-slot:heading>
        Home page
    </x-slot:heading>

<!-- HERO / BIENVENIDA -->
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-bold mb-6">
        Bienvenido 👋
    </h1>

    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
        Esta aplicación es un proyecto desarrollado con <strong>Laravel</strong> y desplegado
        en un entorno real utilizando <strong>Nginx</strong>, pensado como una práctica integral
        de desarrollo backend y despliegue en producción.
    </p>

    <p class="text-lg text-gray-600 dark:text-gray-300">
        La plataforma permite gestionar información, trabajar con bases de datos,
        manejar rutas, controladores y vistas, y aplicar buenas prácticas
        tanto a nivel de código como de servidor.
    </p>
</section>

<!-- GITHUB -->
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-5xl mx-auto px-6 py-16 text-center">
        <h2 class="text-2xl font-semibold mb-4">
            Código fuente del proyecto
        </h2>

        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Todo el código de este proyecto está disponible públicamente en GitHub.
        </p>

        <a
            href="https://github.com/marcosBlasco/Lara.git"
            target="_blank"
            class="inline-block rounded-md bg-indigo-500 px-6 py-3 text-white font-semibold
                   hover:bg-indigo-600 transition"
        >
            Ver repositorio en GitHub
        </a>
    </div>
</section>

<!-- TECNOLOGÍAS -->
<section class="max-w-5xl mx-auto px-6 py-16">
    <h2 class="text-2xl font-semibold mb-8">
        Conceptos y tecnologías aplicadas
    </h2>

    <div class="grid md:grid-cols-2 gap-10">

        <!-- SERVER -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Servidor / Infraestructura
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Nginx como servidor web</li>
                <li>Configuración de virtual hosts y subdominios</li>
                <li>Despliegue en máquina virtual con Ubuntu</li>
                <li>Certificados SSL con Let’s Encrypt y Certbot</li>
                <li>Separación de proyectos estáticos y dinámicos</li>
                <li>Instalación y conexión de MySQL con el proyecto Laravel</li>
                <li>Gestión de permisos y estructura de directorios</li>
            </ul>
        </div>

        <!-- LARAVEL -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Proyecto Laravel
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Routing en Laravel (básico y avanzado)</li>
                <li>Controladores y vistas con Blade</li>
                <li>Layouts y componentes reutilizables</li>
                <li>Integración de Tailwind CSS</li>
                <li>Envío de datos a vistas y parámetros de rutas</li>
                <li>Autoloading y uso de namespaces</li>
                <li>Modelos y ORM Eloquent</li>
                <li>Migraciones y versionado de base de datos</li>
                <li>Seeders para carga de datos de prueba</li>
                <li>Implementación de CRUD completo</li>
                <li>Formularios y protección CSRF</li>
                <li>Validación de datos de entrada</li>
                <li>Paginación de resultados</li>
            </ul>
        </div>

        <!-- CLI -->
        <div>
            <h3 class="text-xl font-semibold mb-4">
                Manejo de CLI / BASH
            </h3>

            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                <li>Uso de la interfaz de línea de comandos (BASH)</li>
                <li>Configuración de conexión SSH con la máquina virtual</li>
            </ul>
        </div>

    </div>
</section>

</x-layout>