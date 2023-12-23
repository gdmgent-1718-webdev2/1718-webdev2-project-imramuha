<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\User;
use DB;

class ResetPasswordController extends Controller
{
    public function sendEmail(Request $request)
    {   
        // if given does not match -> error
        if (!$this->validateEmail($request->email)) 
        {
            return $this->failedResponse();
        }
        $this->send($request->email);
        return $this->successResponse();
    }
    public function send($email)
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }
    public function createToken($email)
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();
        if ($oldToken) {
            return $oldToken->token;
        }
        $token = str_random(60);
        $this->saveToken($token, $email);
        return $token;
    }
    public function saveToken($token, $email)
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }
    public function validateEmail($email)
    {
        return !!User::where('email', $email)->first();
    }
    public function failedResponse()
    {
        return response()->json([
            'error' => 'There was no user found with that email.'
        ], Response::HTTP_NOT_FOUND);
    }
    public function successResponse()
    {
        return response()->json([
            'data' => 'Password reset response has been sent, please check your inbox.'
        ], Response::HTTP_OK);
    }

}
