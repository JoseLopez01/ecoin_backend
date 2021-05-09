<?php


namespace App\Repositories;


use App\Interfaces\CourseScheduleInterface;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class CourseScheduleRepository implements CourseScheduleInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $schedules = CourseSchedule::where('is_active', '=', true)->get();
            return $this->success('All Course Schedules', $schedules);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $schedule = CourseSchedule::find($id);

            if (!$schedule)
                return $this->error('Course schedule not found', 404);

            return $this->success('', $schedule);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $schedule = new CourseSchedule();
            $schedule->course_id = $request->courseid;
            $schedule->week_day_id = $request->weekdayid;
            $schedule->save();

            return $this->success('Schedule created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $schedule = CourseSchedule::find($id);

            if (!$schedule)
                return $this->error('Course schedule not found', 404);

            $schedule->course_id = $request->courseid;
            $schedule->week_day_id = $request->weekdayid;
            $schedule->save();

            return $this->success('Schedule updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $schedule = CourseSchedule::find($id);

            if (!$schedule)
                return $this->error('Course schedule not found', 404);

            $schedule->is_active = false;

            return $this->success('Schedule deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
