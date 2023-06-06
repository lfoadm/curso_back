<p>Olá {{ $user->first_name }},</p>
<p>Seja bem-vindo ao Agora</p>

<h5>Seu código de acesso é:</h5> <h3>{{ $user->token }}</h3>

<br>
{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}
<br>

<a href="{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}">
    Verificar E-mail
</a>