@component('mail::message')
Hi, {{$user->name}}

Someone Checked Your Profile for more info visit to our site.

@component('mail::button', ['url' => 'https://github.com/shakil10sk'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
