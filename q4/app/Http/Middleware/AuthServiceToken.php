<?php
namespace App\Http\Middleware;

use Closure;
use App\Token;

class AuthServiceToken
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $request->header('Authorization');
        
        if ($auth && $auth == sha1('UNIVALI')) {
            return $next($request);
        }
        
        if ($auth) {
            $token = Token::find($auth);
            if ($token) {
                auth()->loginUsingId(substr($token->pes_cod, 0, - 1));
                return $next($request);
            }
        }
        
        return response()->json([
            'error' => 'Token não encontrado'
        ], 403);
    }
}
