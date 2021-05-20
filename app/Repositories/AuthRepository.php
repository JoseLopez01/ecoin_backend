<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\User;
use Carbon\Carbon;

class AuthRepository implements AuthInterface {
    use ResponseAPI;

    public function signUp(Request $request)
    {
        try {
            $request->validate([
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:users',
                'phonenumber' => 'unique:users,phone_number',
                'usertypeid' => 'required|exists:user_types,user_type_id',
                'semesterid' => 'required|exists:semesters,semester_id',
                'password' => 'required|string'
            ]);

            $user = new User([
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'user_type_id' => $request->usertypeid,
                'semester_id' => $request->semesterid,
                'phone_number' => $request->phonenumber,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->save();

            return $this->success('User created', null, 201);
        } catch (\Exception $exception) {
            echo $exception;
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function logIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
            'rememberme' => 'boolean'
        ]);

        $credential = request(['email', 'password']);
        if (!Auth::attempt($credential))
            return $this->error('Unauthorized', 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->rememberme)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return $this->success('User access info', [
            'accesstoken' => $tokenResult->accessToken,
            'tokentype' => 'Bearer',
            'expiresat' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    public function logOut(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->success('Success log out');
    }

    public function user(Request $request)
    {
        return $this->success('', [$request->user()->format()]);
    }
}
