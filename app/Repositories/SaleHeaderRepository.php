<?php


namespace App\Repositories;


use App\Interfaces\SaleHeaderInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\SaleHeader;

class SaleHeaderRepository implements SaleHeaderInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $sales = SaleHeader::where('is_active', '=', true)->get()->map->format();
            return $this->success('', $sales);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $sale = SaleHeader::find($id);
            if (!$sale)
                return $this->error('Sale not found');

            return $this->success('', $sale);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $sale = new SaleHeader();
            $sale->shop_id = $request->shopid;
            $sale->user_id = $request->user()->user_id;

            $sale->save();

            return $this->success('Sale done', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $sale = SaleHeader::find($id);
            if (!$sale)
                return $this->error('Sale not found');

            return $this->success('Sale updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $sale = SaleHeader::find($id);
            if (!$sale)
                return $this->error('Sale not found');

            return $this->error('Sale deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
