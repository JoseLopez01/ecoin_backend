<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentCourseInterface;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    protected $studentCourseInterface;

    public function __construct(StudentCourseInterface $studentCourseInterface)
    {
        $this->studentCourseInterface = $studentCourseInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->studentCourseInterface->getAll();
    }

    /**
     * Gets a single resource by its id
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->studentCourseInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->studentCourseInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->studentCourseInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->studentCourseInterface->delete($id);
    }
}
