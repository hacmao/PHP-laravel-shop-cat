<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Services\CatService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CatController extends ApiController
{
    protected $catService;

    public function __construct(CatService $catService)
    {
        $this->catService = $catService;
    }

    public function list() {
        return Cat::with('city')->get();
    }

    public function findById($id) {
        $res = $this->catService->findById($id);
        return $this->apiResponse($res);
    }

    public function store(Request $request) {
        $res = $this->catService->store($request);
        return $this->apiResponse($res);
    }

    public function updateState(Request $request) {
        $res = $this->catService->updateState($request);
        return $this->apiResponse($res);
    }

    public function filter(Request $request) {
        $res = $this->catService->filter($request);
        Log::info($res);
        return $this->apiResponse($res);
    }
}
