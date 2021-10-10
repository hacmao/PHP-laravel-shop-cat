<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\City;
use Illuminate\Http\Request;
use App\Services\CityService;


class CityController extends ApiController
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function list() {
        return City::all();
    }
}
