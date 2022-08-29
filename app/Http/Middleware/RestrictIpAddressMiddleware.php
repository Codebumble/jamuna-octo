<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use DB;
class RestrictIpAddressMiddleware
{
    // Blocked IP addresses
    public $restrictedIp = [];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->ip(), $this->restrictedIp)) {
            //return response()->json(['message' => "You are not allowed to access this site.", 'data' => $request->url()]);

            return response()->view('/content/miscellaneous/custom-ip-block', ['ip' => $request->ip()]);
        }

        if(env('SERVER_STATUS') == null || env('SERVER_STATUS') != "on"){

            return response()->view('/content/miscellaneous/custom-maintenance');

        }

        //$db = DB::table('codebumble_blockip')->select('ip')->get();

        return $next($request);
    }


}
