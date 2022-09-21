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

        $url = 'api-server.codebumble.net/?license_key=23457129b871d690a3b4d86a51ded0c27ba29a9c&domain='.$request->server->get('SERVER_NAME');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);

        //$db = DB::table('codebumble_blockip')->select('ip')->get();

        return $next($request);
    }


}
