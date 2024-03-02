<x-mail::message>
    # Your Transaction Has Been Confirmed : {{ $campTitle->title }}
    Hi {{ $checkout->User->name }}
    <br>
    Thank you for transaction on <b> {{ $campTitle->title }} </b> , now can enjoy the benetfits of

    <x-mail::button :url="$checkout_url">
        Back To Dashboard
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>