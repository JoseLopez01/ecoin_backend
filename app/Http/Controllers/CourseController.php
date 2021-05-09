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

    public function getAll()
    {
        return $this->courseInterface->getAll();
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
}
