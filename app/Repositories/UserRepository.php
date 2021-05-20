<?php


namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\User;

class UserRepository implements UserInterface
{
    use ResponseAPI;

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function create(Request $request)
    {
        // TODO: Implement create() method.
    }

    public function update(Request $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function searchStudents(string $search)
    {
        try {
            $students = User::where('is_active', '=', true)
                        ->where('user_type_id', '=', 1)
                        ->where('email', 'LIKE', "%{$search}%")
                        ->get()->map->formatAsStudent();

            return $this->success('', $students);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getCourses(Request $request)
    {
        try {
            $student = User::find($request->user()->user_id)->courses()->get()->map->format();

            return $this->success('', $student);
        } catch (\Exception $exception) {
            echo $exception;
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
