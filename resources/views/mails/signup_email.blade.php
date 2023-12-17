<x-mail::message>
# Hello {{ $data['name'] }}
# Welcome to Handy Man - A place to get professionals for your job.


Below Is Your Account Verification OTP CODE.<br>
NOTE: This is not valid after now.

<h1>{{ $data['verification_code'] }}</h1>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
