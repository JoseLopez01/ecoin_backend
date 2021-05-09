<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseScheduleInterface;
use Illuminate\Http\Request;

class CourseScheduleController extends Controller
{
    protected $courseScheduleInterface;

    public function __construct(CourseScheduleInterface $courseScheduleInterface)
    {
        $this->courseScheduleInterface = $courseScheduleInterface;
    }

    /**
     * Gets all active resources
     *
     * @method GET
     */
    public function getAll()
    {
        return $this->courseScheduleInterface->getAll();
    }

    /**
     * Gets a single resource by its ID
     *
     * @method GET
     */
    public function getById(int $id)
    {
        return $this->courseScheduleInterface->getById($id);
    }

    /**
     * Creates a new resource
     *
     * @method POST
     */
    public function create(Request $request)
    {
        return $this->courseScheduleInterface->create($request);
    }

    /**
     * Updates a existing resource
     *
     * @method PUT
     */
    public function update(Request $request, int $id)
    {
        return $this->courseScheduleInterface->update($request, $id);
    }

    /**
     * Deletes a existing resource
     *
     * @method DELETE
     */
    public function delete(int $id)
    {
        return $this->courseScheduleInterface->delete($id);
    }
}
