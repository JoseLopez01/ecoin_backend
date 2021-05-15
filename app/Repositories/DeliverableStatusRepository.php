<?php


namespace App\Repositories;

use App\Interfaces\DeliverableStatusInterface;
use App\Models\DeliverableStatus;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;


class DeliverableStatusRepository implements DeliverableStatusInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $statuses = DeliverableStatus::where('is_active', '=', true)->get()->map->format();

            return $this->success('', $statuses);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $status = DeliverableStatus::find($id);

            if (!$status)
                return $this->error('Status not found', 404);

            return $this->success('', $status);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $status = new DeliverableStatus();
            $status->description = $request->description;
            $status->save();

            return $this->success('Status created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $status = DeliverableStatus::find($id);

            if (!$status)
                return $this->error('Status not found', 404);

            $status->description = $request->description;
            $status->save();

            return $this->success('Status updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $status = DeliverableStatus::find($id);

            if (!$status)
                return $this->error('Status not found', 404);

            $status->is_active = false;
            $status->save();

            return $this->success('Status deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
