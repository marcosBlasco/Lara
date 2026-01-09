<x-layout>

    <x-slot:heading>
        Verify your email
    </x-slot:heading>
    

    <p>
        Te enviamos un enlace de verificación.
        Revisá tu correo (y spam).
    </p>

    @if (session('status') === 'verification-link-sent')
        <p>Te reenviamos el enlace.</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button>Reenviar correo</button>
    </form>
</x-layout>