<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Services\CatService;
use Illuminate\Http\Response;

class CatController extends ApiController
{
    protected $catService;

    public function __construct(CatService $catService)
    {
        $this->catService = $catService;
    }

    public function list() {
        return Cat::all();
    }

    public function findById($id) {
        return Cat::where('id', $id)->get();
    }

    public function store(Request $request) {
        $res = $this->catService->store($request);
        return $this->apiResponse($res);
    }
}
