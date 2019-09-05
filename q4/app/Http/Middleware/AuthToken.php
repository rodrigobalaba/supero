<?php
namespace App\Http\Middleware;

use Closure;
use App\Token;

class AuthToken
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
        
        if ($auth) {
            $token = Token::find($auth);
            if ($token) {
                auth()->loginUsingId(substr($token->pes_cod, 0, - 1));
                return $next($request);
            }
            return response()->json([
                'error' => 'Não encontrado'
            ], 401);
        }
        
        return response()->json([
            'error' => 'Não permitido'
        ], 403);
    }
}
