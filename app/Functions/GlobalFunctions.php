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
?>