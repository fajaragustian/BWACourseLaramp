<x-mail::message>
    # Register Camp : {{ $campTitle->title }}
    Hi {{ $checkout->User->name }}
    <br>
    Thank you for register on <b> {{ $campTitle->title }} </b> , please see payment instruction by click the button
    below.

    The body of your message.

    <x-mail::button :url="$checkout_url">
        Get Invoice
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>