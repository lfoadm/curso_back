<?php

namespace App\Http\Controllers\Auth;

use App\Events\PasswordForgotTokenRequested;
use Illuminate\Support\Str;
use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordForgotRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordForgotController extends Controller
{
    public function __invoke(PasswordForgotRequest $request)
    {
        
        $input = $request->validated();
        $user = User::query()
            ->whereEmail($input['email'])
            ->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        $token = $user->resetPasswordTokens()->create([
            'token' => strtoupper(Str::random(6))
        ]);

        PasswordForgotTokenRequested::dispatch($user, $token->token);
    }
}
