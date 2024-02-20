<x-mail::message>
    Hi {{ $user->name }}

    <br>
    Welcome to laracamp, your account has been created succesfully, now can choose your best match camp!

    <x-mail::button :url="$route_url">
        Dashboard
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>