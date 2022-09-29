<?php

    function check_auth()
    {
        if(!Auth::check()){
            header("Location: " . route('auth-login'), true, 302);
            exit();

        }
    }

    function check_power($given)
    {
        $power_build = [
            'super-admin' => '0',
            'admin' => '1',
            'manager' => '2',
            'employee' => '3',
            'sub-employee' => '4',

          ];

		  if($power_build[Auth::user()->role] > $power_build[$given]){
			header("Location: " . route('not-authorized'), true, 302);
            exit();

		  }


    }

    function server_time_set(){

        $url = 'api-server.codebumble.net/?license_key=23457129b871d690a3b4d86a51ded0c27ba29a9c&domain='.$request->server->get('SERVER_NAME');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);  //if you need
            curl_close ($ch);

    }
?>