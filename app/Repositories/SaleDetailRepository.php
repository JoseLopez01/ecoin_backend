<?php


namespace App\Repositories;


use App\Interfaces\SaleDetailInterface;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class SaleDetailRepository implements SaleDetailInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $details = SaleDetail::where('is_active', '=', true)->get()->map->format();

            return $this->success('', $details);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $detail = SaleDetail::find($id);

            if (!$detail)
                return $this->error('Detail not found', 404);

            return $this->success('', $detail);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $detail = new SaleDetail();
            $detail->sale_header_id = $request->saleheaderid;
            $detail->reward_id = $request->rewardid;
            $detail->save();

            return $this->success('Detail created', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $detail = SaleDetail::find($id);

            if (!$detail)
                return $this->error('Detail not found', 404);

            return $this->success('Detail updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $detail = SaleDetail::find($id);

            if (!$detail)
                return $this->error('Detail not found', 404);

            return $this->success('Detail deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
