<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DeleteDisplayRequest;
use App\Http\Requests\Api\StoreDisplayRequest;
use App\Http\Requests\Api\DisplayIndexRequest;
use App\Http\Requests\Api\ShowDisplayRequest;
use App\Http\Requests\Api\UpdateDisplayRequest;
use App\Models\Display;
use App\Services\DisplayService;

class DisplayController extends Controller
{
    protected $service;
    public function __construct(DisplayService $service)
    {
        $this->service = $service;
    }

    public function index(DisplayIndexRequest $request)
    {
        $displays = $this->service->index($request);
        return response()->json($displays, 200);
    }

    public function show(ShowDisplayRequest $request, Display $display)
    {
        return response()->json($display, 200);
    }

    public function store(StoreDisplayRequest $request)
    {
        $display = $this->service->store($request->all(), request()->user()->id);
        return response()->json($display, 200);
    }

    public function update(UpdateDisplayRequest $request, Display $display)
    {
        $displayUpdated = $this->service->update($display, $request->all());
        return response()->json($displayUpdated, 200);
    }

    public function destroy(DeleteDisplayRequest $request, Display $display)
    {
        $this->service->destroy($display);
        return response()->json(['message' => 'Display destroyed successfully!'], 200);
    }
}

