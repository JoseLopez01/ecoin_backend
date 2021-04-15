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
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'phonenumber' => 'unique:users',
                'user_type_id' => 'required|exists:user_types,user_type_id',
                'semester_id' => 'required|exists:semesters,semester_id',
                'password' => 'required|string|confirmed'
            ]);

            $user = new User([
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'user_type_id' => $request->usertypeid,
                'semester_id' => $request->semesterid,
                'phonenumber' => $request->phonenumber,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->save();

            return $this->success('User created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function logIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credential = request(['email', 'password']);
        if (!Auth::attempt($credential))
            return $this->error('Unauthorized', 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return $this->success('', [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->expires_at)->toDateTimeString()
        ]);
    }

    public function logOut(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->success('Success log out');
    }

    public function user(Request $request)
    {
        return $this->success('', $request->user());
    }
}
