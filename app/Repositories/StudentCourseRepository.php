<?php


namespace App\Repositories;


use App\Interfaces\StudentCourseInterface;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class StudentCourseRepository implements StudentCourseInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $courses = StudentCourse::where('is_active', '=', true)->get()->map->format();

            return $this->success('', $courses);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $course = StudentCourse::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            return $this->success('', $course);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $course = new StudentCourse();
            $course->course_id = $request->courseid;
            $course->user_id = $request->userid;
            $course->save();

            return $this->success('Student course created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $course = StudentCourse::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            $course->course_id = $request->courseid;
            $course->save();

            return $this->success('Student course updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $course = StudentCourse::find($id);

            if (!$course)
                return $this->error('Course not found', 404);

            $course->is_active = false;
            $course->save();

            return $this->success('Student course deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
