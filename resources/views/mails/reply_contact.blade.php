<x-mail::message>
# Hello {{ $data['name'] }}
# You have a reply from Handyman Services

Below are details of the conversation:<br>

@component('mail::panel')

<b>Your Message:</b><br>
{{ $data['subject'] }}<br>
{{ $data['message'] }}<br>

@endcomponent

@component('mail::panel')

<b>Reply:</b><br>
{{ $data['replied_message'] }}<br>

@endcomponent

Thanks for reaching out.<br>
We hope to provide more services in the future.<br>
{{ config('app.name') }}
</x-mail::message>
