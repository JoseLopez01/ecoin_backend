<?php


namespace App\Repositories;


use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Course;

class CourseRepository implements CourseInterface
{

    use ResponseAPI;

    public function getAll()
    {
        try {
            $courses = Course::where('is_active', '=', true)->get()->map->format();

            return $this->success('All courses', $courses);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }

    }

    public function getById(int $id)
    {
        try {
            $course = Course::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            return $this->success('Course', $course->get()->format());
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $course = new Course();
            $course->user_id = $request->user()->user_id;
            $course->name = $request->name;
            $course->save();

            return $this->success('Course created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $course = Course::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            $course->name = $request->name;
            $course->save();

            return $this->success('Course updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $course = Course::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            $course->is_active = false;
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getStudents($classId)
    {
        try {
            $course = Course::find($classId);

            if (!$course)
                return $this->error('Course not found', 404);

            $students = $course->users();

            return $this->success('', $students);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getClassShop($classId)
    {
        try {
            $course = Course::find($classId);

            if (!$course)
                return $this->error('Course not found', 404);

            $shop = $course->shop();

            return $this->success('', $shop);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getSchedules($classId)
    {
        try {
            $course = Course::find($classId);

            if (!$course)
                return $this->error('Course not found', 404);

            $schedules = $course->schedules();

            return $this->success('', $schedules);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
