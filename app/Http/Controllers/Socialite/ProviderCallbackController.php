<?php

namespace App\Http\Controllers\Socialite;

use App\Models\User;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProviderCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $profider)
    {

        if(!in_array($profider, ['github', 'google']))
        {
            // abort(404, 'Invalid provider');
            return redirect(route('login'))->withErrors(['provider', 'Invalid provider']);
        }

        try {

            $socialUseruser = Socialite::driver($profider)->user();
            $user = User::updateOrCreate([
                'provider_id' => $socialUseruser->id,
                'provider_name' => $profider,
            ], [
                'name' => ($socialUseruser->name) ? $socialUseruser->name : $socialUseruser->nickname,
                'email' => $socialUseruser->email,
                'provider_token' => $socialUseruser->token,
                'provider_refresh_token' => $socialUseruser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect(route('login'))->withErrors([
                'provider' => $th->getMessage()
            ]);
        }

    }
}
