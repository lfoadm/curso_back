<p>Olá {{ $user->first_name }},</p>
<p>Seja bem-vindo ao Agora</p>

<h5>Seu código de acesso é:</h5> <h3>{{ $user->token }}</h3>

<br>
{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}
<br>

<a class="mt-10" href="{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}">
    Verificar E-mail
</a>

<div>
    <div v-if="isLoading">
        <strong>VERIFICANDO............</strong>
    </div>

    <div v-else-if="!isReady">
        <div class="text-body-1 text-error text-center mb-6">
            Token inválido ou já foi verificado! 
        </div>
        <hr>
        <h6 class="text-h6 text-muted font-weight-medium d-flex justify-center align-center mt-3">
            Clique para
            
        </h6>
    </div>

    <div v-else class="text-success text-center">
        E-mail verificado com sucesso!
        Obrigado, <strong>DFASDF</strong> por verificar seu e-mail.
    </div>
</div> 

<style></style>