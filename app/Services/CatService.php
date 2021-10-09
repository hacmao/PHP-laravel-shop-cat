<?php

namespace App\Services;

use App\Models\Cat;
use App\Models\CatType;
use App\Models\ResponseModel;
use Illuminate\Http\Response;

class CatService {
    public function store($request) {
        // validate
        $res = CatType::select('name')->where('name', $request->type)->get();
        $query = CatType::select('name');
        $query->where('name', $request->type);
        if (count($query->get()) != 1) {
            $error_msg = "Wrong cat type";
            return new ResponseModel(Response::HTTP_BAD_REQUEST, [], $error_msg );
        }

        $cat = Cat::create([
            'name' => $request->name,
            'img' => $request->img,
            'type' => $request->type,
            'location' => $request->location,
            'age' => $request->age,
            'price' => $request->price
        ]);
        return new ResponseModel(Response::HTTP_OK, $cat);
    }
}
