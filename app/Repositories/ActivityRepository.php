<?php


namespace App\Repositories;


use App\Interfaces\ActivityInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Activity;

class ActivityRepository implements ActivityInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $activities = Activity::where('is_active', '=', true)->get()->map->format();
            return $this->success('All Activities', $activities);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $activity = Activity::find($id)->get()->format();

            if (!$activity)
                return $this->error('Activity not found', 404);

            return $this->success('Activity', $activity);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $activity = new Activity();
            $activity->course_id = $request->courseid;
            $activity->name = $request->name;
            $activity->description = $request->description;
            $activity->until = $request->until;
            $activity->since = $request->since;
            $activity->ecoins = $request->ecoins;
            $activity->save();

            return $this->success('Activity created', [], 201);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {

            $activity = Activity::find($id);

            if (!$activity)
                return $this->error('Activity not found', 404);

            $activity->name = $request->name;
            $activity->description = $request->description;
            $activity->save();

            return $this->success('Activity updated', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $activity = Activity::find($id);

            if (!$activity)
                return $this->error('Activity not found', 404);

            $activity->is_active = false;
            $activity->save();

            return $this->success('Activity deleted', 404);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getActivityClass(int $id)
    {
        try {
            $activity = Activity::find($id);

            if (!$activity)
                return $this->error('Activity not found', 404);

            return $this->success('', $activity->course());
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getDeliverablesByStatus(int $activityId, int $deliverableStatus)
    {
        try {
            $activity = Activity::find($activityId);

            if (!$activityId)
                return $this->error('Activity not found', 404);

            $deliverables = $activity->deliverables()->where('status_id', '=', $deliverableStatus);

            return $this->success('', $deliverables);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
