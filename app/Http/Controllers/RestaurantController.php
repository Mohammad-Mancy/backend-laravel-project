<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function getAllRestaurants($id = null){
        if($id != null){
            $restos = Restaurant::find($id);
        }else{
            $restos = Restaurant::all();
        }
        
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }
}
