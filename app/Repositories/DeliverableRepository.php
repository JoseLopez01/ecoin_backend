<?php


namespace App\Repositories;

use App\Interfaces\DeliverableInterface;
use App\Models\Deliverable;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;


class DeliverableRepository implements DeliverableInterface
{

    use ResponseAPI;

    public function getAll()
    {
        try {
            $deliverables = Deliverable::where('is_active', '=', 'true')->get()->map->format();
            return $this->success('', $deliverables);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $deliverable = Deliverable::find($id);

            if (!$deliverable)
                return $this->error('Deliverable not found', 404);

            return $this->success('', $deliverable);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $deliverable = new Deliverable();
            $deliverable->user_id = $request->user()->user_id;
            $deliverable->activity_id = $request->activity_id;
            $deliverable->status_id = $request->statusid;
            $deliverable->comments = $request->comments;
            $deliverable->save();

            return $this->success('Activity deliveraded', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $deliverable = Deliverable::find($id);

            if (!$deliverable)
                return $this->error('Deliverable not found', 404);

            $deliverable->status_id = $request->statusid;
            $deliverable->comments = $request->comments;
            $deliverable->save();

            return $this->success('Activity updated', null);

        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $deliverable = Deliverable::find($id);

            if (!$deliverable)
                return $this->error('Deliverable not found', 404);

            return $this->success('deleted', null);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getStatus(int $deliverableId)
    {
        try {
            $deliverable = Deliverable::find($deliverableId);

            if (!$deliverable)
                return $this->error('Deliverable not found', 404);

            $status = $deliverable->status();

            return $this->success('', $status);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getFiles(int $deliverableId)
    {
        try {
            $deliverable = Deliverable::find($deliverableId);

            if (!$deliverable)
                return $this->error('Deliverable not found', 404);

            $files = $deliverable->files();

            return $this->success('', $files);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
