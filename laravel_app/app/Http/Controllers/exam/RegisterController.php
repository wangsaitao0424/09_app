<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;//redis
class RegisterController extends Controller
{
    public function register()
    {
        return view('exam/register');
    }
    public function exam_key()
    {
        return view('exam/key');
    }
    public function exam_com(Request $request)
    {
        $accessToken=$request->all();
        if(empty($accessToken['token'])){
            dd("accessToken");
        }
        return view('exam/com',['accessToken'=>$accessToken['token']]);
    }
}
