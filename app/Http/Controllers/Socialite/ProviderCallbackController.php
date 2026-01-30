<?php

namespace App\Http\Controllers\Socialite;

use App\Models\User;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Log;
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
                'email' => $socialUseruser->email,
            ], [
                'name' => ($socialUseruser->name) ? $socialUseruser->name : $socialUseruser->nickname,
                'email' => $socialUseruser->email,
                'provider_token' => $socialUseruser->token,
                'provider_refresh_token' => $socialUseruser->refreshToken,
            ]);

           // $user->save();

            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());

            return redirect(route('login'))->withErrors([
                'provider' => "Authentication with {$profider} failed. Please try again."
            ]);
        }

    }
}
