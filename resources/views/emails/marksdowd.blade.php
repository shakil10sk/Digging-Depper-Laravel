@component('mail::message')
# Well Come to 

This is test Message for testing laravel own template mailing system.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
