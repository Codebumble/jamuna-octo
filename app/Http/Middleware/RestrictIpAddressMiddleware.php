<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use DB;
class RestrictIpAddressMiddleware
{
    // Blocked IP addresses
    public $restrictedIp = ['127.0.0.1'];
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

        //$db = DB::table('codebumble_blockip')->select('ip')->get();

        return $next($request);
    }


}
