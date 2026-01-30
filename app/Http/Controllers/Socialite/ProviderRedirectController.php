<?php

namespace App\Http\Controllers\Socialite;


use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Log;
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

            Log::info('Login with {profider} started', ['profider' => $profider]);

            $http_redirect_response = Socialite::driver($profider)->redirect();
            return $http_redirect_response;
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return redirect(route('login'))->withErrors(['provider', $th->getMessage()]);
        }

    }
}
