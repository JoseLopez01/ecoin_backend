<?php


namespace App\Repositories;


use App\Interfaces\PriceInterface;
use App\Models\Price;
use Composer\DependencyResolver\Problem;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class PriceRepository implements PriceInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $prices = Price::where('is_active', '=', 'true')->get()->format();
            return $this->success('', $prices);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $price = Price::find($id);

            if (!$price)
                return $this->error('Price not found', 404);

            return $this->success('', $price->get()->format());
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $price = new Price();
            $price->reward_id = $request->rewardid;
            $price->price = $request->price;
            $price->description = $request->description;
            $price->save();

            return $this->success('Price added', 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $price = Price::find($id);

            if (!$price)
                return $this->error('Price not found', 404);

            $price->price = $request->price;
            $price->description = $request->description;
            $price->save();

            return $this->success('Price updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $price = Price::find($id);

            if (!$price)
                return $this->error('Price not found', 404);

            $price->is_active = false;
            $price->save();

            return $this->success('Price deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
