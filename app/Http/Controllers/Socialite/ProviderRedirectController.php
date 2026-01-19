<?php

namespace App\Http\Controllers\Socialite;


use Laravel\Socialite\Socialite;
use App\Http\Controllers\Controller;


class ProviderRedirectController extends Controller
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
            return Socialite::driver($profider)->redirect();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect(route('login'))->withErrors(['provider', $th->getMessage()]);
        }

    }
}
