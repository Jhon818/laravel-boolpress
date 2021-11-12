<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Dotenv\Result\Success;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
        #recupero l'autorization token dalla request
        $aut_token = request()->header('authorization');
        #verifa del token
        if (empty($aut_token)) {
           return response()->json([
               'success' => false,
               'error' => 'Api Token mancante'
           ]);
        }
        #estrarre l'api Token 
        $api_token = substr($aut_token , 7);

        #verifica correttezza Api Token
        $user = User::where('api_token' , $api_token)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Api Token Errato'
            ]);
        }
        else {
            return $next($request);
        }
    }
}
