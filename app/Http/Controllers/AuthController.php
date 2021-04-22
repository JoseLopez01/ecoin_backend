<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authInterface;

    public function __construct(AuthInterface $authInterface) {
        $this->authInterface = $authInterface;
    }

    public function signUp(Request $request) {
        return $this->authInterface->signUp($request);
    }

    public function login(Request $request) {
        return $this->authInterface->logIn($request);
    }

    public function logout(Request $request) {
        return $this->authInterface->logOut($request);
    }

    public function user(Request $request) {
        return $this->authInterface->user($request);
    }
}
