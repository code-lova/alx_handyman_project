<x-mail::message>
# Hello.!! {{ $data['name'] }}
# Account verification was successful.

Start Exploring the handy man application, to meet your first client<br>
Below are your Details:

Username.:{{ $data['username'] }}<br>

Login to complete your account profile so customers can see you.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
