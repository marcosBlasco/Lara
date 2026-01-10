<x-layout>

    <x-slot:heading>
        Verify your email
    </x-slot:heading>
    

    <p>
        A verification link has been sent to your email address.
        Please check your inbox (and spam folder).
    </p>

    @if (session('status') === 'verification-link-sent')
        <p>We’ve resent the link.</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-button class="mt-6"
>Resend email</x-button>
    </form>
</x-layout>