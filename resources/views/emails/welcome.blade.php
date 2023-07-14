<p>Olá {{ $user->first_name }},</p>
<p>Seja bem-vindo ao Agendei</p>

<strong>Seu portal de agendamento</strong>


<div class="base">
    <a class="mt-10" href="{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}">
        Verificar E-mail
    </a>
</div> 

<style>
    .base {
        background-color: cadetblue
    }
</style>