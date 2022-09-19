<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
      // $ip = $request->ip();
      //$ip = (new \Illuminate\Http\Request)->ip();
     //  $ip = '1.208.104.201'; /* Static IP address */
     //  $ip = '103.130.144.255'; /* Static IP address */
        $currentUserInfo = Location::get($_SERVER['REMOTE_ADDR']);

       // $currentUserInfo = Location::get('103.14.107.255');

        if (isset($currentUserInfo) &&  $currentUserInfo==true) {
            $code = $currentUserInfo->countryCode;
            if ($code == "IR" || $code == "PK" || $code == "AF") {
                return redirect('/fa');

            } else if ($code == "UM" || $code == "US" || $code == "KR" || $code=="NL") {
                return redirect('/en');
            } else if ($code == "IQ" || $code == "SA" || $code == "YE" || $code="RO") {
                return redirect('/ar');
            }
            else{
                return redirect('/fa');
            }
        }

     else
{
    return redirect('/fa');
}




        }


}


