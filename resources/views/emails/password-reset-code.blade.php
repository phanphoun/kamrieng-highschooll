<x-mail::message>
# Hello!

You are receiving this email because we received a password reset request for your account.

Your password reset code is:

<x-mail::panel>
<div style="text-align: center; font-size: 32px; font-weight: bold; letter-spacing: 10px;">{{ $code }}</div>
</x-mail::panel>

Enter this code on the reset password page. The code will expire in 60 minutes.

If you did not request a password reset, no further action is required.

Regards,<br>
{{ config('app.name') }}
</x-mail::message>
