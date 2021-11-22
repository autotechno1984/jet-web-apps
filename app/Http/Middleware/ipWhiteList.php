<?php

namespace App\Http\Middleware;

use App\Models\WhiteListIp;
use Closure;
use Illuminate\Http\Request;

class ipWhiteList
{

    public $whitelistip  ;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $this->whitelistip = WhiteListIp::pluck('whiteip')->toArray();

        if(!in_array($request->ip(), $this->whitelistip)){
            return response()->json('Your Ip is restricted',404);
        }

        return $next($request);
    }
}
