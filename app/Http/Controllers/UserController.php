<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->userInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->userInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->userInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->userInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->userInterface->delete($id);
    }

    public function searchStudents(string $search)
    {
        return $this->userInterface->searchStudents($search);
    }

    public function getCourses(Request $request)
    {
        return $this->userInterface->getCourses($request);
    }
}
