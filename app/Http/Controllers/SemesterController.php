<?php

namespace App\Http\Controllers;

use App\Interfaces\SemesterInterface;
use Illuminate\Http\Request;

class SemesterController extends Controller
{

    protected $semesterInterface;

    public function __construct(SemesterInterface $semesterInterface)
    {
        $this->semesterInterface = $semesterInterface;
    }

    public function getALl()
    {
        return $this->semesterInterface->getAll();
    }

    public function getById($id)
    {
        return $this->semesterInterface->getById($id);
    }

    public function create(Request $request)
    {
        return $this->semesterInterface->create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->semesterInterface->update($request, $id);
    }

    public function delete($id)
    {
        return $this->semesterInterface->delete($id);
    }
}
