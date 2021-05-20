<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseInterface;

    public function __construct(CourseInterface $courseInterface)
    {
        $this->courseInterface = $courseInterface;
    }

    public function getAll(Request $request)
    {
        return $this->courseInterface->getAll($request);
    }

    public function getById(int $id)
    {
        return $this->courseInterface->getById($id);
    }

    public function create(Request $request)
    {
        return $this->courseInterface->create($request);
    }

    public function update(Request $request, int $id)
    {
        return $this->courseInterface->update($request, $id);
    }

    public function delete(int $id)
    {
        return $this->courseInterface->delete($id);
    }

    /**
     * Gets schedules related to a course
     *
     * @method GET
     */
    public function getSchedules($classId)
    {
        return $this->courseInterface->getSchedules($classId);
    }

    /**
     * Gets students registered in a class
     *
     * @method GET
     */
    public function getStudents($classId)
    {
        return $this->courseInterface->getStudents($classId);
    }

    /**
     * Gets shop related to a course
     *
     * @method GET
     */
    public function getClassShop($classId)
    {
        return $this->courseInterface->getClassShop($classId);
    }

    /**
     * Get class activities
     *
     * @method GET
     */
    public function getActivities(int $classId)
    {
        return $this->courseInterface->getActivities($classId);
    }
}
