<?php

namespace App\Services;

use App\Models\Cat;
use App\Models\CatType;
use App\Models\ResponseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
            'price' => $request->price,
            'state' => CatState::AVAILABLE
        ]);
        return new ResponseModel(Response::HTTP_OK, $cat);
    }

    public function updateState($request) {
        $id = $request->id;
        $cat = Cat::where('id', $id)->findOrFail($id);
        $cat->update([
            'state' => $request->state
        ]);
        return new ResponseModel(Response::HTTP_OK, $cat);
    }

    public function filter($request) {
        Log::info($request);
        $cat_type = $request->cat_type;
        $city = $request->city;
        $max_price = $request->max_price;

        $cats = Cat::with('city');
        $cats->whereBetween('price', [0, $max_price]);
        if ($cat_type && count($cat_type) !=0) {
            $cats->whereIn('type', $cat_type);
        }
        if ($city && count($city) != 0) {
            $cats->whereHas('city', function ($query) use ($city) {
                $query->whereIn('name', $city);
            });
        }
        return new ResponseModel(Response::HTTP_OK, $cats->get());
    }
}
