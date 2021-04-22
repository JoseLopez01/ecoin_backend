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

    public function getById($id)
    {
        return $this->userTypeInterface->getById($id);
    }

    public function create(Request $request)
    {
        return $this->userTypeInterface->create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->userTypeInterface->update($request, $id);
    }

    public function delete($id)
    {
        return $this->userTypeInterface->delete($id);
    }

}
