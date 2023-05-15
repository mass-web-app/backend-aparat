<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterNewUserRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(RegisterNewUserRequest $request)
    {
        $field = $request->has('email') ? 'email' : 'mobile';
        $value = $request->get($field);
        //Todo : generate code random for send
        $code = '123456';
        //Todo : get time cache a configuration
        Cache::put('user-auth-register-' . $value, ['field' => $field, 'code' => $code], now()->addDays(5));
        //Todo:Send Email OR SMS To User
        Log::info('SEND-REGISTER-CODE-MESSAGE-TO-USER', ['code' => $code]);
        return response([
            'message' => 'کاربر ثبت موقت شد',
        ], 200);
    }
}
