<x-layout>

    <x-slot:heading>
        Verify your email
    </x-slot:heading>
    

    <p>
        We’ve sent you a verification link.
Please check your email (and spam folder).
    </p>

    @if (session('status') === 'verification-link-sent')
        <p>We’ve resent the link.</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button class="bg-gray-950/50 text-gray-300 hover:text-white rounded-md  px-3 py-2 text-sm font-medium"
>Resend email</button>
    </form>
</x-layout>