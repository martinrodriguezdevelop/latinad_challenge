<?php
namespace App\Services;

use App\Models\Display;

class DisplayService
{
    const ITEMS_PER_PAGE = 10;
    const DEFAULT_PAGE = 1;

    public function index($request)
    {
        $query = Display::query();

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        $perPage = $request->input('perPage', self::ITEMS_PER_PAGE);
        $page = $request->input('page', self::DEFAULT_PAGE);

        $displays = $query->paginate($perPage, ['*'], 'page', $page);

        return $displays;
    }

    public function store($data, $user)
    {
        $display = Display::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price_per_day' => $data['price_per_day'],
            'resolution_height' => $data['resolution_height'],
            'resolution_width' => $data['resolution_width'],
            'type' => $data['type'],
            'user_id' => $user->id,
        ]);

        return $display;
    }

    public function update($display, $data)
    {
        $display->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price_per_day' => $data['price_per_day'],
            'resolution_height' => $data['resolution_height'],
            'resolution_width' => $data['resolution_width'],
            'type' => $data['type'],
        ]);

        return $display->fresh();

    }
    public function destroy($display)
    {
        return $display->delete();
    }
}