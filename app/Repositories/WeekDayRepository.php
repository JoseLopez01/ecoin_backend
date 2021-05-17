<?php


namespace App\Repositories;


use App\Interfaces\WeekDayInterface;
use App\Models\WeekDay;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class WeekDayRepository implements WeekDayInterface
{
    use ResponseAPI;

    public function getAll()
    {
        try {
            $weekdayd = WeekDay::where('is_active', '=', true)->get()->map->format();
            return $this->success('', $weekdayd);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function getById(int $id)
    {
        try {
            $weekday = WeekDay::find($id);

            if (!$weekday)
                return $this->error('Week Day not found', 404);

            return $this->success('', $weekday);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function create(Request $request)
    {
        try {
            $weekday = new WeekDay();
            $weekday->description = $request->description;
            $weekday->save();

            return $this->success('Weekday created', null, 201);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $weekday = WeekDay::find($id);

            if (!$weekday)
                return $this->error('Week Day not found', 404);

            $weekday->description = $request->description;
            $weekday->save();

            return $this->success('Week day updated');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete(int $id)
    {
        try {
            $weekday = WeekDay::find($id);

            if (!$weekday)
                return $this->error('Week Day not found', 404);

            $weekday->is_active = false;
            return $this->success('Week day deleted');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
