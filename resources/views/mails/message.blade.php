<x-mail::message>
# You have a new message.

Below are your Details:<br>

@component('mail::panel')
<b>Subject:</b><br>
{{ $data['subject'] }}<br>

<b>Status:</b><br>
{{ $data['status'] }}<br>

<b>Message:</b><br>
{{ $data['message'] }}<br>

@endcomponent

Please Login to respond

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
