<?php


namespace App\Repositories;


use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Course;

class CourseRepository implements CourseInterface
{

    use ResponseAPI;

    public function getAll(Request $request)
    {
        try {
            $courses = Course::where('is_active', '=', true, )
                ->where('user_id', '=', $request->user()->user_id)
                ->withCount('users')
                ->with('weekdays')
                ->get()->map->format();

            return $this->success('All courses', $courses);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }

    }

    public function getById(int $id)
    {
        try {
            $course = Course::where('course_id', '=', $id)
              ->withCount('users')
              ->get()->map->format();

            if (!$course)
                return $this->error('Course not found', 404);

            return $this->success('Course', $course);
        } catch (\Exception $exception) {
            echo $exception;
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

            $students = $course->users()
                ->with('semester')
                ->get()->map->formatAsStudent();

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

            $shop = $course->shop()
                ->with('rewards')
                ->with('rewards.price')
                ->get()->map->format();

            return $this->success('', $shop);
        } catch (\Exception $exception) {
            echo $exception;
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getSchedules($classId)
    {
        try {
            $course = Course::find($classId);

            if (!$course)
                return $this->error('Course not found', 404);

            echo $course->schedules();

            $schedules = $course->schedules();

            return $this->success('', $schedules);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getActivities(int $classId)
    {
        try {
            $course = Course::find($classId);

            if (!$course)
                return $this->error('Course not found', 404);

            $activities = $course->activities()->get()->map->format();

            return $this->success('', $activities);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
