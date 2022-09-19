<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([],function ($router){
    Route::get("/send-request",function(){

        $client = new \GuzzleHttp\Client();
        $response = Http::withHeaders([

            'quest'=>'است دین ستون نماز',
            'arguments'=>1,
        ])->post('http://135.181.118.81:8337/tag', [
            'auth' => ['username='=>'chehreh', 'password'=>'ali110']
        ]);
        dd($response); die();


    });

//    Route::get("/send-request",function(){
//        $curl = curl_init();
//        $input=[
//            "quest"=>"نماز ستون دین است ",
//            "arguments"=>1];
//        $payload = array(
//            "body" => $input,
//        );
//        //   var_dump(json_encode($payload));
//        curl_setopt_array($curl,
//            array(
//                CURLOPT_URL =>"http://135.181.118.81:8337/tag",
//                CURLOPT_POST => true,
//                CURLOPT_POSTFIELDS => ($payload),
//                #CURLOPT_HEADER => true,
//                CURLOPT_USERNAME=>'chehreh',
//                CURLOPT_PASSWORD=>'ali110',
//                CURLOPT_RETURNTRANSFER => true,
//            )
//        );
//        $result = curl_exec($curl);
//        curl_close($curl);
//        dd($result) ;
////        $ch = curl_init();
////        curl_setopt($ch, CURLOPT_URL, "http://135.181.118.81:8337/tag");
////        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
////        curl_setopt($ch, CURLOPT_USERNAME, 'chehreh');
////        curl_setopt($ch, CURLOPT_PASSWORD, 'ali110');
////        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"quest":"است دین ستون نماز ","arguments":1}');
////        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////        $output = curl_exec($ch);
////        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
////        curl_close($ch);
////        dump($httpcode);
////        dump(json_decode($output));
////        return $output;
//    });
//    Route::get("/send-request",function(){
//        $curl = curl_init();
//        $input=[
//            "quest"=>"نماز ستون دین است ",
//            "arguments"=>1];
//            $payload = array(
//            "body" => $input,
//        );
//     //   var_dump(json_encode($payload));
//        curl_setopt_array($curl,
//            array(
//                CURLOPT_URL =>"http://135.181.118.81:8337/tag",
//                CURLOPT_POST => true,
//                CURLOPT_POSTFIELDS => json_encode($payload),
//                #CURLOPT_HEADER => true,
//                CURLOPT_USERNAME=>'chehreh',
//                CURLOPT_PASSWORD=>'ali110',
//                CURLOPT_RETURNTRANSFER => true,
//            )
//        );
//        $result = curl_exec($curl);
//        curl_close($curl);
//     dd($result) ;
////        $ch = curl_init();
////        curl_setopt($ch, CURLOPT_URL, "http://135.181.118.81:8337/tag");
////        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
////        curl_setopt($ch, CURLOPT_USERNAME, 'chehreh');
////        curl_setopt($ch, CURLOPT_PASSWORD, 'ali110');
////        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"quest":"است دین ستون نماز ","arguments":1}');
////        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////        $output = curl_exec($ch);
////        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
////        curl_close($ch);
////        dump($httpcode);
////        dump(json_decode($output));
////        return $output;
//    });
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[AuthController::class],'register');
Route::post('/login',[AuthController::class],'login');
Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::get('/logout',[AuthController::class],'logout');
});

