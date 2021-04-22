<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthInterface {

    /*
     * Creates a new user
     *
     * @param Illuminate\Http\Request   $request
     *
     * @method POST
     * */
    public function signUp(Request $request);

    /*
     * Logs in a user
     *
     * @param Illuminate\Http\Request   $request
     *
     * @method POST
     * */
    public function logIn(Request $request);

    /*
     * Logs out a logged user
     *
     * @param Illuminate\Http\Request   $request
     *
     * @method GET
     * */
    public function logOut(Request $request);

    /*
     * Gets requester logged user
     *
     * @param Illuminate\Http\Request   $request
     * */
    public function user(Request $request);
}
