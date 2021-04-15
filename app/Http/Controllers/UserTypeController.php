<?php

namespace App\Http\Controllers;

use App\Interfaces\UserTypeInterface;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    protected $userTypeInterface;

    public function __construct(UserTypeInterface $userTypeInterface)
    {
        $this->userTypeInterface = $userTypeInterface;
    }

    public function getAll()
    {
        return $this->userTypeInterface->getAll();
    }
}
