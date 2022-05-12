@component('mail::message')
# Register Camp: {{ $checkout->camp->title }}

Hi, {{ $checkout->user->name }}

Thank you for register on <b>{{ $checkout->camp->title }}</b>, pleasi see payment instruction by the click the button below.

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
