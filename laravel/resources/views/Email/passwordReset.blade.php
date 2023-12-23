@component('mail::message')
# Request password reset

Don't worry, you can change your AquaLobby-password by clicking on the button below:

@component('mail::button', ['url' => 'http://localhost:4200/password-reset-response?token='.$token])
RESET YOUR PASSWORD
@endcomponent

If it was not you who sent the request, feel free to delete this email.

Thanks,<br>
The {{ config('app.name') }} Team
@endcomponent
