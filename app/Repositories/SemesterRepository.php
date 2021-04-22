<?php

namespace App\Repositories;

use App\Interfaces\SemesterInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Semester;

class SemesterRepository implements SemesterInterface
{

    use ResponseAPI;

    public function getAll()
    {
        try {
            $semesters = Semester::where('is_active', '=', true)->get()->map->format();
            return $this->success('All semesters', $semesters);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $semester = Semester::find($id)->get();
            if (!$semester)
                return $this->error('Semester does not exist', 404);

            return $this->success('Semester', $semester);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $semester = new Semester();
            $semester->description = $request->description;
            $semester->is_active = true;
            $semester->save();

            return $this->success('Semester created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $semester = Semester::find($id);
            if (!$semester)
                return $this->error('Semester does not exist', 404);

            $semester->description = $request->description;
            $semester->save();

            return $this->success('Semester updated', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $semester = Semester::find($id);
            if (!$semester)
                return $this->error('Semester does not exist', 404);

            $semester->is_active = false;
            $semester->save();

            return $this->success('Semester deleted', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
