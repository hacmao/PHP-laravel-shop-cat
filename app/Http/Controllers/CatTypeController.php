<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\CatType;
use Illuminate\Http\Request;
use App\Services\CatTypeService;


class CatTypeController extends ApiController
{
    protected $catTypeService;

    public function __construct(CatTypeService $catTypeService)
    {
        $this->catTypeService = $catTypeService;
    }

    public function list() {
        return CatType::all(['name']);
    }
}
