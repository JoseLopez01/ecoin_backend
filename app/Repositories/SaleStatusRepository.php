<?php


namespace App\Repositories;


use App\Interfaces\SaleStatusInterface;
use App\Models\SaleStatus;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class SaleStatusRepository implements SaleStatusInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $statuses = SaleStatus::where('is_active', '=', true)->get()->map->format();
            return $this->success('', $statuses);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $status = SaleStatus::find($id);

            if (!$status)
                return $this->error('Status not found');

            return $this->success('', $status);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $status = new SaleStatus();
            $status->description = $request->description;
            $status->save();

            return $this->success('Status created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $status = SaleStatus::find($id);

            if (!$status)
                return $this->error('Status not found');

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
            $status = SaleStatus::find($id);

            if (!$status)
                return $this->error('Status not found');

            $status->is_active = false;
            $status->save();

            return $this->success('Status deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
